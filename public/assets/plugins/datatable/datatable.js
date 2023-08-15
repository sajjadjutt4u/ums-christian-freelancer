$(function() {
    var table;


    table = $('#activities').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
        // Other configuration options...
    });


    var serialNumber = 1;
    activities.forEach(function(activity) {
        var rowData = [
            serialNumber,
            userData.name,
            activity.subject,
            activity.request_url,
            activity.request_method,
            activity.ip,
            JSON.parse(activity.metadata).device,
            JSON.parse(activity.metadata).browser,
            activity.created_at,
            '<a tabindex="0" role="button" class="btn btn-icon popover-link" data-trigger="focus" data-placement="left" data-toggle="popover" title="User Agent" data-content="' + escapeHtml(activity.user_agent) + '"><i class="fa fa-info-circle"></i></a>'
        ];
        table.row.add(rowData).draw();
        serialNumber++; // Increment the serial number for the next row
    });

    // Initialize popovers after the table is populated
    $('.popover-link').popover();

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }


});

