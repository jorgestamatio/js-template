  $(document).ready(new function() {
      // This filter is later used as the selector for which grid items to show.
      var filter = '';
      var handler;

      // Prepare layout options.
      var options = {
        autoResize: true, // This will auto-update the layout when the browser window is resized.
        container: $('#main'), // Optional, used for some extra CSS styling
        offset: 5, // Optional, the distance between grid items
        itemWidth: 280 // Optional, the width of a grid item
      };


      // This function filters the grid when a change is made.
      var refresh = function() {
        // This hides all grid items ("inactive" is a CSS class that sets opacity to 0).
        $('#posters li').addClass('inactive');

        // Create a new layout selector with our filter.
        handler = $(filter);

        // This shows the items we want visible.
        handler.removeClass("inactive");

        // This updates the layout.
        handler.wookmark(options);
      }

      /**
       * This function checks all filter options to see which ones are active.
       * If they have changed, it also calls a refresh (see above).
       */
      var updateFilters = function() {
        var oldFilter = filter;
        filter = '';
        var filters = [];

        // Collect filter list.
        var lis = $('#filters li');
        var i=0, length=lis.length, li;
        for(; i<length; i++) {
          li = $(lis[i]);
          if(li.hasClass('active')) {
            filters.push('#posters li.'+li.attr('data-filter'));
          }
        }

        // If no filters active, set default to show all.
        if(filters.length == 0) {
          filters.push('#posters li');
        }

        // Finalize our filter selector for jQuery.
        filter = filters.join(', ');

        // If the filter has changed, update the layout.
        if(oldFilter != filter) {
          refresh();
        }
      };

      /**
       * When a filter is clicked, toggle it's active state and refresh.
       */
      var onClickFilter = function(event) {
        var item = $(event.currentTarget);
        item.toggleClass('active');
        updateFilters();
      }

      // Capture filter click events.
      $('#filters li').click(onClickFilter);

      // Do initial update (shows all items).
      updateFilters();

      // Solving the initial layout problem caused by bootstrap
      $(window).resize();


      /**
       * When an item is clicked. add the content to a modal and show.
       */
      var onClickPoster = function(event) {
        var item = $(event.currentTarget);
        var title = item.find('h2').html();
        var content = item.html();
        $('#modal .modal-title').html(title);
        $('#modal .modal-text').html(content);
        $('#modal').modal('show');
      }

      // Capture filter click events.
      $('#posters li').click(onClickPoster);


});