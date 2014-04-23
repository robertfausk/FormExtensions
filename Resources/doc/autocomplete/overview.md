# Autocomplete
---------------------------------------

[go back to Table of contents][back-to-index]

[back-to-index]: https://github.com/avocode/FormExtensions/blob/master/Resources/doc/documentation.md

[jquery-ui-autocomplete-api]: http://jqueryui.com/autocomplete/
[jquery-ui-autocomplete-demo]: http://api.jqueryui.com/autocomplete/
[symfony-texttype]: http://symfony.com/doc/current/reference/forms/types/text.html

### Form Type

 `afe_autocomplete`

### Description

Use [jQuery Ui Autocomplete Widget][jquery-ui-autocomplete-demo] as GUI wrapper to suggest inputco.

### Options

##### appendTo

**type**: `string`, **default**: `null`

Which element the menu should be appended to. For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-appendTo).

##### autoFocus

**type**: `boolean`, **default**: `false`

If set to `true` the first item will automatically be focused when the menu is shown. For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-autoFocus).

##### delay

**type**: `integer`, **default**: `300`

The delay in milliseconds between when a keystroke occurs and when a search is performed.  For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-delay).


##### disabled

**type**: `boolean`, **default**: `false`

Disables the autocomplete if set to `true`. For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-disabled).


##### minLength

**type**: `integer`, **default**: `1`

The minimum number of characters a user must type before a search is performed.
Zero is useful for local data with just a few items, but a higher value should be used when a single character search could match a few thousand items.
For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-minLength).

##### position

**type**: `Object`, **default**: `{ my: "left top", at: "left bottom", collision: "none" }`

Identifies the position of the suggestions menu in relation to the associated input element.
For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-position).

##### source

**type**: `array` or `string` or `function`, **default**: `none; either source or sourceRouteName must be specified`

Defines the data to use. For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-autoFocus).
Examples:

```JavaScript
    [lorem, ipsum, dolor, sit, amet]
    ```
```JavaScript
    [{label: "choice1", value: "lorem"}, {label: "choice2", value: "ipsum"}, ...]
    ```
`http://my.domain.org/autocompleteApi`

```JavaScript
   function( request, response ) {
        $.ajax({
              url: "http://api.geonames.org/searchJSON",
              dataType: "jsonp",
              data: {
                  username: "demo",
                  featureClass: "P",
                  style: "full",
                  maxRows: 12,
                  name_startsWith: request.term
              },
              success: function( data ) {
                  response( $.map( data.geonames, function( item ) {
                      return {
                          label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
                          value: item.name
                      }
                  }));
              }
          })
      }
      ```


##### sourceRouteName

**type**: `string`, **default**: `none; either source or sourceRouteName must be specified`

Defines the data to use. It resolves given route and use it for `source`. For further information see [jQuery Ui Autocomplete Doc](http://api.jqueryui.com/autocomplete/#option-autoFocus).
If both `source` and `sourceRouteName` is specified, `sourceRouteName` will be used.
