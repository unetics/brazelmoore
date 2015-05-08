(function($) {     
    // Setting up our variables
    var $filter;
    var $container;
    var $containerClone;
    var $filterLink;
    var $filteredItems
     
    // Set our filter
    $filter = $('.filter li.active a').attr('class');
     
    // Set our filter link
    $filterLink = $('.filter li a');
     
    // Set our container
    $container = $('ul.filterable-grid');
     
    // Clone our container
    $containerClone = $container.clone();
  
    // Apply our Quicksand to work on a click function
    // for each of the filter li link elements
    $filterLink.click(function(e) 
    {
        // Remove the active class
        $('.filter li').removeClass('active');
         
        // Split each of the filter elements and override our filter
        $filter = $(this).attr('class').split(' ');
         
        // Apply the 'active' class to the clicked link
        $(this).parent().addClass('active');
         
        // If 'all' is selected, display all elements
        // else output all items referenced by the data-type
        if ($filter == 'all') {
            $filteredItems = $containerClone.find('li'); 
        }
        else {
            $filteredItems = $containerClone.find('li[data-type~=' + $filter + ']'); 
        }
         
        // Finally call the Quicksand function
        $container.quicksand($filteredItems, 
        {
            // The duration for the animation
            duration: 0,
            // The easing effect when animating
/*             easing: 'easeInOutCirc', */
            // Height adjustment set to dynamic
            adjustHeight: 'auto'
            
        });
    });
})( jQuery );


	(function($) {    
		$(document).ready(function() {

			/* initialize shuffle plugin */
			var $grid = $('#grid');

			$grid.shuffle({
				itemSelector: '.item' // the selector for the items in the grid
			});

			/* reshuffle when user clicks a filter item */
			$('#filter a').click(function (e) {
				e.preventDefault();

				// set active class
				$('#filter a').removeClass('active');
				$(this).addClass('active');

				// get group name from clicked item
				var groupName = $(this).attr('data-group');

				// reshuffle grid
				$grid.shuffle('shuffle', groupName );
			});

		});
		})( jQuery );
		
