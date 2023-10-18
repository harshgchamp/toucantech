"use strict";
var KTDatatablesExtensionButtons = function() {

	var initTable1 = function() {

		// begin first table
		 var table = $('#kt_datatable1').DataTable({
			   		responsive: true, 
					dom: 'lBfrtip',
			  lengthChange: true,
			  "pageLength": 100,
			  buttons: ['print', 'excel', 'pdf']
		  });

	};

	var initTable2 = function() { 
		// begin first table
		var table = $('#kt_datatable2').DataTable({
			responsive: true,  
                        lengthChange: true,
                        "pageLength": 100,
			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			], 
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			// initTable1();
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionButtons.init();
});