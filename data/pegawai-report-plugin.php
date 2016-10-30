<?php
	//gaji min dan max
	//include "db-connect.php";

	$row	= R::getRow( 'SELECT MIN(gaji_dasar) as bawah, MAX(gaji_dasar) as atas FROM pegawai' );
	//umur min dan max
	$umur	= R::getRow( 'SELECT MIN(birthdate) as bawah, MAX(birthdate) as atas FROM pegawai' );
	$today = new DateTime();
	$biday1 = new DateTime($umur['bawah']);
	$biday2 = new DateTime($umur['atas']);
	$umurMin = $today->diff($biday1);
	$umurMax = $today->diff($biday2);
?>
<script>
// Gaji
var bawah=<?php echo $row['bawah']; ?>;
var atas=<?php echo $row['atas']; ?>;
//Umur
var umurMax=<?php echo $umurMin->y ?>;
var umurMin=<?php echo $umurMax->y ?>;

var
	handleDatepicker = function() {
        $("#datepicker-default").datepicker({
            todayHighlight: !0
        }), $("#datepicker-inline").datepicker({
            todayHighlight: !0
        }), $(".input-daterange").datepicker({
            todayHighlight: !0
        }), $("#datepicker-disabled-past").datepicker({
            todayHighlight: !0
        }), $("#datepicker-autoClose").datepicker({
            todayHighlight: !0,
            autoclose: !0
        })
    },
    handleIonRangeSlider = function() {
        $("#slider_gaji_dasar").ionRangeSlider({
            min: bawah,
            max: atas,
            from: bawah,
            to: atas,
            type: "double",
            step: 500000,
			prefix: "Rp.",
            postfix: ", 00",
            hasGrid: !0
        })
    },
		handleSliderUmur = function() {
        $("#slider_umur").ionRangeSlider({
            min: umurMin,
            max: umurMax,
            from: umurMin,
            to: umurMax,
            type: "double",
            step: 1,
						prefix: " ",
            postfix: " Tahun",
            hasGrid: !0
        })
    },
    handleFormTimePicker = function() {
        "use strict";
        $("#timepicker").timepicker()
    },
    handleFormPasswordIndicator = function() {
        "use strict";
        $("#password-indicator-default").passwordStrength(), $("#password-indicator-visible").passwordStrength({
            targetDiv: "#passwordStrengthDiv2"
        })
    },
    handleJqueryAutocomplete = function() {
        var a = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
        $("#jquery-autocomplete").autocomplete({
            source: a
        })
    },
    handleBootstrapCombobox = function() {
        $(".combobox").combobox()
    },
    handleTagsInput = function() {
        $(".bootstrap-tagsinput input").focus(function() {
            $(this).closest(".bootstrap-tagsinput").addClass("bootstrap-tagsinput-focus")
        }), $(".bootstrap-tagsinput input").focusout(function() {
            $(this).closest(".bootstrap-tagsinput").removeClass("bootstrap-tagsinput-focus")
        })
    },
    handleSelectpicker = function() {
        $(".selectpicker").selectpicker("render")
    },
    handleJqueryTagIt = function() {
        $("#jquery-tagIt-default").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-inverse").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-white").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-primary").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-info").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-success").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-warning").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-danger").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        })
    },
    handleDateRangePicker = function() {
        $("#birthdate").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/1945",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#birthdate input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
	handleDateRangePicker2 = function() {
        $("#tgl_sk").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2000",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#tgl_sk input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
	handleDateRangePicker3 = function() {
        $("#tgl_grade").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2000",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#tgl_grade input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
	handleDateRangePicker4 = function() {
        $("#tgl_masuk").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2000",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#tgl_masuk input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
	handleDateRangePicker5 = function() {
        $("#tgl_mulai").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2000",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#tgl_mulai input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
	handleDateRangePicker6 = function() {
        $("#tgl_capeg").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2000",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#tgl_capeg input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
	handleDateRangePicker7 = function() {
        $("#tgl_pegawai").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2000",
            maxDate: "12/31/2020"
        },
		function(a, t) {
            $("#tgl_pegawai input").val(a.format("YYYY/MM/DD") + " - " + t.format("YYYY/MM/DD"))
        })
    },
    handleSelect2 = function() {
        $(".default-select2").select2(), $(".multiple-select2").select2({
            placeholder: "Pilihan"
        })
    },
    FormPlugins = function() {
      "use strict";
      return {
	      init: function() {
		      handleDatepicker(),
					handleIonRangeSlider(),
					handleSliderUmur(),
					handleFormTimePicker(),
					handleFormPasswordIndicator(),
					handleJqueryAutocomplete(),
					handleBootstrapCombobox(),
					handleSelectpicker(),
					handleTagsInput(),
					handleJqueryTagIt(),
					handleDateRangePicker(),
					handleDateRangePicker2(),
					handleDateRangePicker3(),
					handleDateRangePicker4(),
					handleDateRangePicker5(),
					handleDateRangePicker6(),
					handleDateRangePicker7(),
					handleSelect2()
	      }
      }
    }();
</script>
