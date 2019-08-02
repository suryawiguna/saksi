$(document).ready(function() {
    $('#myTable').dataTable( {
        "order": [],
        initComplete: function () {
            this.api().columns('.select-filter').every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );

    $('#myTable tbody').on('click', 'td:not(:first-child)', function () {
        $(this).closest('tr').toggleClass('selected');

        //...

    });

    // Tampilkan gambar foto koordinator yang dipilih saat isi data
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#fotoKtpKoorPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fotoKtpKoor").change(function(){
        readURL(this);
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#fotoDiriKoorPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fotoDiriKoor").change(function(){
        readURL2(this);
    });



    // Tampilkan gambar foto koordinator yang dipilih saat isi data
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#fotoKtpSaksiPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fotoKtpSaksi").change(function(){
        readURL3(this);
    });

    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#fotoDiriSaksiPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fotoDiriSaksi").change(function(){
        readURL4(this);
    });


// DROPDOWN NAMA KOORDINATOR
    //Initialize with the list of symbols
let names = ["Surya Wiguna", "User", "Nama Koordinator"];

//Find the input search box
let search = document.getElementById("searchCoin")

//Find every item inside the dropdown
let items = document.getElementsByClassName("dropdown-item")
function buildDropDown(values) {
    let contents = []
    for (let name of values) {
    contents.push('<input type="button" class="dropdown-item" type="button" value="' + name + '"/>')
    }
    $('#menuItems').append(contents.join(""))

    //Hide the row that shows no items were found
    $('#empty').css({display: 'none'})
}

//Capture the event when user types into the search box
window.addEventListener('input', function () {
    filter(search.value.trim().toLowerCase())
})

//For every word entered by the user, check if the symbol starts with that word
//If it does show the symbol, else hide it
function filter(word) {
    let length = items.length
    let collection = []
    let hidden = 0
    for (let i = 0; i < length; i++) {
    if (items[i].value.toLowerCase().startsWith(word)) {
        $(items[i]).css({display: 'block'})
    }
    else {
        $(items[i]).css({display: 'none'})
        hidden++
    }
    }

    //If all items are hidden, show the empty view
    if (hidden === length) {
    $('#empty').css({display: 'block'})
    }
    else {
    $('#empty').css({display: 'none'})
    }
}

//If the user clicks on any item, set the title of the button as the text of the item
$('#menuItems').on('click', '.dropdown-item', function(){
    $('#dropdown_coins').text($(this)[0].value)
    $("#dropdown_coins").dropdown('toggle');
})

buildDropDown(names)


} );
