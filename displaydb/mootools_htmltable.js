// Sortable table with Mootools: http://aryweb.nl/projects/mootools-demos/?demo=HtmlTable

// Display car database
window.addEvent('domready', function(){

  // This is where we create a new HtmlTable instance
  var id_displaycardb = new HtmlTable($('id_displaycardb'), {
    zebra: true,
    sortable: true,
    selectable: true,
    classRowSelected: 'selected',
    // allowMultiSelect: true,
    parsers: ['string','string','number','number','float','float','float','float','float','float','float','float','float','float','string','number','number'],
    onRowFocus: function(tr){
      tr.tween('opacity', [.5, 1]);
    }
  });
});

// Display motor database
window.addEvent('domready', function(){

  // This is where we create a new HtmlTable instance
  var id_displaymotdb = new HtmlTable($('id_displaymotdb'), {
    zebra: true,
    sortable: true,
    selectable: true,
    classRowSelected: 'selected',
    // allowMultiSelect: true,
    parsers: ['string','string','string','float','number','number','number','number','number','number','number','string','date','number'],
    onRowFocus: function(tr){
      tr.tween('opacity', [.5, 1]);
    }
  });
});

// Display battery database
window.addEvent('domready', function(){

  // This is where we create a new HtmlTable instance
  var id_displaybattdb = new HtmlTable($('id_displaybattdb'), {
    zebra: true,
    sortable: true,
    selectable: true,
    classRowSelected: 'selected',
    // allowMultiSelect: true,
    parsers: ['string','string','float','float','float','number','number','string','string','date','string'],
    onRowFocus: function(tr){
      tr.tween('opacity', [.5, 1]);
    }
  });
});