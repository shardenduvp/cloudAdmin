;(function ($, window, document, undefined) {
    if ($("body").data("page") === "form-element") {
        // Log page name
        // ================================
        console.log("Page: " + $("body").data("page") + ".html");

        // Datepicker
        // ================================
        (function () {
            // default
            $("#datepicker1").datepicker();

            // date in other moonth
            $("#datepicker2").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            // button bar
            $("#datepicker3").datepicker({
                showButtonPanel: true
            });

            // display month & year
            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true
            });

            // select date range
            $("#datepicker-from").datepicker({
                defaultDate: "+1w",
                numberOfMonths: 2,
                onClose: function (selectedDate) {
                    $("#datepicker-to").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#datepicker-to").datepicker({
                defaultDate: "+1w",
                numberOfMonths: 2,
                onClose: function (selectedDate) {
                    $("#datepicker-from").datepicker("option", "maxDate", selectedDate);
                }
            });
        })();

        // Custom select
        // ================================
        customSelect();
        (function () {
			
            // custom select

            //$("#selectize-customselect1").selectize();
			//$("#selectize-customselect2").selectize();
			//$("#selectize-customselect_supplier1").selectize();
			//$("#selectize-customselect_supplier2").selectize();
           // $("#selectize-customselect").selectize();
			//$("#satnam").selectize();
			//$("#time_z").selectize();



           /* // tagging
            $("#selectize-tagging").selectize({
                delimiter: ",",
                persist: false,
                create: function (input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });

            // select
            $("#selectize-select").selectize({
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                dropdownParent: "body"
            });

            // multiple select
            $("#selectize-selectmultiple").selectize({
                maxItems: 3
            });*/
        })();
    }
})(jQuery, window, document);