$(document).ready(function () {
            // Create jqxProgressBar.
            $("#jqxProgressBar").jqxProgressBar({ width: 250, height: 30, value: 50});
            $("#jqxVerticalProgressBar").jqxProgressBar({ width: 30, height: 250, value: 50, orientation: 'vertical'});
            // Create jqxButton.
            $('#button').jqxButton({});
            // Update ProgressBars.
            $('#button').click(function () {
                var value = $('#ValueInput')[0].value;
                $("#jqxProgressBar").jqxProgressBar({ value: value });
                $("#jqxVerticalProgressBar").jqxProgressBar({ value: value });
            });
            $("#checkbox").jqxCheckBox({});
            $("#customtextcheckbox").jqxCheckBox({});
            $("#checkbox").on('change', function (event) {
                $("#jqxProgressBar").jqxProgressBar({ showText: event.args.checked });
                $("#jqxVerticalProgressBar").jqxProgressBar({ showText: event.args.checked });
            });
            var renderText = function (text) {
                return "<span class='jqx-rc-all' style='background: #ffe8a6; color: #e53d37; font-style: italic;'>" + text + "</span>";
            }
            $("#customtextcheckbox").on('change', function (event) {
                if (event.args.checked) {
                    $("#jqxProgressBar").jqxProgressBar({ renderText: renderText });
                    $("#jqxVerticalProgressBar").jqxProgressBar({ renderText: renderText });
                }
                else {
                    $("#jqxProgressBar").jqxProgressBar({ renderText: null });
                    $("#jqxVerticalProgressBar").jqxProgressBar({ renderText: null });
                }
            });
        });