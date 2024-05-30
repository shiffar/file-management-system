var membersDT;
$(document).ready(function(){
        /** 
         * Initializing DataTable
         * Load Data using Ajax
        */
        membersDT = $('#membersTbl').DataTable({
                        processing: true,
                        serverSide: true,
                        columns:[
                            {
                                width:"20%",
                                data:'date'
                            },
                            {
                                width:"40%",
                                data:'name'
                            },
                            {
                                width:"20%",
                                data:'email'
                            },
                            {
                                width:"20%",
                                data:'phone'
                            }
                        ],
                        ajax: {
                            method:'POST',
                            url:'dt-query.php',
                            data: {'registered_from' : $('input[name="registered_from"]').val(), 'registered_to' : $('input[name="registered_to"]').val(), 'searchByName2' : $('select[name="searchByName2"]').val()}
                        },
                        lengthMenu: [ [20, 50,  -1], [20, 50, "All"] ]
                    });

    membersDT.on('draw.dt', function(){
        /**
         * Add Event Listener to the custom inputs
         */
        $('input[name="registered_from"], input[name="registered_to"], select[name="searchByName2"]').change(function(){
                //Update Ajax data
                membersDT.context[0].ajax.data = {'registered_from' : $('input[name="registered_from"]').val(), 'registered_to' : $('input[name="registered_to"]').val(), 'registered_to' : $('select[name="searchByName2"]').val()}
                //Update DataTable data
                membersDT.draw();
        })
    })
})