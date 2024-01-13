$(document).ready(function(){
    $("#filter-form").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: '<?= site_url('DataTableController/filterData') ?>',
            type: 'GET',
            data: {
                startDate: $('#startDate').val(),
                endDate: $('#endDate').val()
            },
            success: function(response){
                $("#table-container").html(response);
            }
        });
    });
});