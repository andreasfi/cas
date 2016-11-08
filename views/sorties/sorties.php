


<?php

$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR . 'views/header.inc'; ?>



<div class="content">
    <div class="container">
        <div class="row">
            <div id="calendar" class="fc fc-unthemed fc-ltr col-md-offset-1 col-md-10"></div>
        </div>
		<div class="row" style="margin:1em 1em;">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div style="background: #52b9e9; width: 0.5em; height: 0.5em; display: inline-block;"></div>
				<b><?php echo $lang['RANDONNEES'];?></b>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div style="background: #fa3031; width: 0.5em; height: 0.5em; display: inline-block;"></div>
				<b><?php echo $lang['SORTIES'];?></b>
			</div>
			<div class="col-md-2 text-center">
				<?php

                if(isset($_SESSION['user'])){
                if($_SESSION['user']->getMemberType() == 3){?>
				<a class="btn btn-primary" href="sorties/ajoutsortie">Ajouter une sortie</a>
				<?php }
                }?>
			</div>
			<div class="col-md-5"></div>
		</div>
        <table id="datatable">
            <thead>
            <tr>
                <th>Title</th>
                <th>Start</th>
                <th>End</th>
                <th>Difficulty</th>
                <th>Type</th>
                <th>Category</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<script>

    //1 : rando (1 day)
    //2 : sortie (2+ days)
    var event_type_color = ["#fa3031", "#52b9e9"];
    var event_type_textcolor = 'white';

    var event_ids = [];

    var datatable_data = [];
    var calendar_data = [];

    function loadEvents() {
        //Get JSON data in string format.
        var json_events = '<?php echo $this->vars['propositions']; ?>';
		//convert newline elements to <br/>
		json_events = json_events.replace(/(?:\r\n|\r|\n)/g, '&nbsp');
        //Parse the string to JSON.
        json_events = JSON.parse(json_events);
        for (var i = 0; i < json_events.length; i++) {
            //0. Fetch the first event
            var event = json_events[i];

            var row_dataset = [];

            //init rows for the datatable
            row_dataset[0] = event['title'];
            row_dataset[1] = event['start_date'];
            row_dataset[2] = event['end_date'];
            row_dataset[3] = event['difficulty'];
            row_dataset[4] = event['event_type'];
            row_dataset[5] = event['event_category'];

            event_ids[i] = event['id'];

            var color = event_type_color[1];
            if(event['event_type'] == 'sortie')
            {
                color = event_type_color[0];
            }

            //init calendar
            item_calendar = {};
            item_calendar['idEvent'] = event['id'];
            item_calendar['title'] = decodeHTML(event['title']);
            item_calendar['start'] = event['start_date'];
			item_calendar['end'] = event['end_date'];
            item_calendar['constraint'] = 'businessHours';
            item_calendar['color'] = color;
            item_calendar['textcolor'] = event_type_textcolor;
            item_calendar['description'] = "Very cool event";
            item_calendar['difficulty'] = event['difficulty'];

            calendar_data.push(item_calendar);
            datatable_data.push(row_dataset);
        }
    }
	
	


    $(document).ready(function () {
        loadEvents();
        initCalendar('fr')
        initDataTable();
    });
	
	function decodeHTML(html){
		var txt = document.createElement("textarea");
    	txt.innerHTML = html;
    	return txt.value;
	}

    function initCalendar(locale) {
        var today = new Date();
        var today_d = today.getDate();
        var today_m = today.getMonth() + 1;
        var today_y = today.getYear() + 1900;

        var today_string = today_y + '-' + today_m + '-' + today_d;


        $('#calendar').fullCalendar({
            locale: locale,
            contentHeight: 400,
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month'
            },
            eventRender: function(event, element) {
                $(element).tooltip({title: initTooltip(event.description, event.difficulty, "fr"), container: "body", html: true})
            },
            defaultDate: today_string,
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: true,
            events: calendar_data,
            eventClick: function(calEvent, jsEvent, view) {
                window.location.replace("<?php echo URL_DIR; ?>/sorties/details/"+calEvent.idEvent);
            }
        });

        $('.fc-today-button'). click();
    }

    /***
     * Returns a <div> element to insert into the tooltip
     */
    function initTooltip(description, difficulty, lang)
    {
        switch(lang)
        {
            case "fr" : return description + "</br>" + "Niveau : " +difficulty;
            case "en" : return description + "</br>" + "Level : "+difficulty;
        }
    }


    function initDataTable() {

        var table = $('#datatable').DataTable({
            paging: true,
            scrollY: 300,
            data: datatable_data
        });

        $('#datatable').on('click', 'tr', function()
        {
            var index = table.row(this).index();
            window.location.replace("<?php echo URL_DIR; ?>/sorties/details/"+event_ids[index]);
        });
    }

</script>
<?php

include_once ROOT_DIR.'views/footer.inc';