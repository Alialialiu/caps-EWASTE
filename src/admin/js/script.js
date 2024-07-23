$(document).ready(function() {
    $(document).on('click','.btnItem', function(e){
        e.preventDefault();
        var url = '../src/admin/components/dialogs/dialogs.php';
        var dataId = $(this).attr("id");
        $.post(url, {getId : dataId},
            function (response) {
                  $('#infoItemModal').html(response);
            });
    });

    $(document).on('click','.btnTbl', function(e){
        e.preventDefault();
        var url = 'components/dialogs/tables.php';
        var dataId = $(this).attr("id");
        $.post(url, {getId : dataId},
            function (response) {
                  $('#modalTableDnt').html(response);
            });
    });
// this is for dropdown
    $('.menu-dropdown-toggle').click(function() {
      $(this).toggleClass('menu-dropdown-show');
      $(this).next('.menu-dropdown').toggleClass('menu-dropdown-show');
    });
// this is for add ewaste
    $("#formSaveItem").submit(function(e) {
        e.preventDefault();
        var url = 'php/addEwaste.php';
        var data = $(this).serialize();
            $.post(url, data, function(response) {
                alert(response.msg);
            });
    });
// this is alert to a user input for adding ewaste
    function checkInputs() {
        const user = $('#searchInput').val().trim();
        const category = $('#category').val();
        const info = $('#info').val().trim();
        const condition = $('#condition').val();
        const points = $('#points').val().trim();

        if (user && category && info && condition && points) {
            $('button[type="submit"]').removeAttr('disabled').removeClass('disabled');
             $('#error').addClass('hidden');
        } else {
            $('button[type="submit"]').attr('disabled', 'disabled').addClass('disabled');
             showError("Please fill out all fields!");
        }
    }
    function showError(message) {
        const alertHtml = `
            <div role="alert"  class="animate__animated animate__flash font-popin text-sm alert p-1 rounded-lg shadow-sm">
                <i class='bx bx-error text-xl text-red-600'></i>
                <span>${message}</span>
            </div>`;
        $('#error').html(alertHtml).removeClass('hidden');
    }
    function updatePreview() {
        $('#previewUser').val($('#searchInput').val());
        $('#previewCategory').val($('#category option:selected').text());
        $('#previewCondition').val($('#condition option:selected').text());
        $('#previewPoints').val($('#points').val());
        $('#previewItem').val($('#info').val());
    }

    $('#searchInput, #category, #info, #condition, #points').on('input change', function() {
        checkInputs();
        updatePreview();
    });
// this is for adding Categories
    $("#formSaveCty").submit(function(e) {
        e.preventDefault();
        var url = 'php/addCty.php';
        var data = $(this).serialize();
        $.post(url, data, function(response) {
            alert(response.msg);
            if (response.scs) {
                // Append the new category to the DOM
                var newCategoryHTML = `
                    <div class="flex flex-col">
                        <div>
                            <button class="btn ml-2 btn-ghost float-left btn-sm w-auto font-normal font-popin tooltip tooltip-right tooltip-info" data-tip="view as a table" onclick="modalTableDnt.showModal()">${response.cty_name} >></button>
                        </div>
                        <div id="itemInfo_${response.cty_id}" class="carousel carousel-center max-w-full p-4 gap-2 bg-neutral h-52 bg-transparent rounded-box">
                            <!-- Items belonging to this category will be here -->
                        </div>
                    </div>`;
                $('#ctyHtml').append(newCategoryHTML);
            }
        }, 'json');
    });
// this is for auto complete
    $('#searchInput').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '../src/admin/php/dataSearch.php', // Change this to the PHP file that handles the search
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 1, // Minimum length of input before autocomplete is triggered
            response: function(event, ui) {
                if (!ui.content.length) {
                    ui.content.push({ label: "No results found", value: null });
                }
            },
            select: function(event, ui) {
                var selectedValue = ui.item.value;
                var selectedId = ui.item.id; // Assuming the ID is included in the JSON data
                $('#userId').val(selectedId);
                // alert("Selected Value: " + selectedValue + ", Selected ID: " + selectedId);
            }
        });
});