// --START APPROVAL VARIABLES
let confirmationMessage, confirmButton;
let hiddenForm, hiddenReportId, hiddenApproval;
let approveButtons, rejectButtons;
let dataTable;
let selectedId = 0;
let approve = true;
// --END APPROVAL VARIABLES

// --START VIEW BY DATE VARIABLES
let fromSchoolYear, toSchoolYear;
let semesterFilter;
let fromDate, toDate;
let exactDate;
// --END VIEW BY DATE VARIABLES

function initViewByDate(identifs, tbl, minYear, maxYear, SEMESTERS_PER_YR){
    initializePopOvers();
    dataTable = initializeDataTable(tbl);
    initViewByDateVars(identifs, minYear, maxYear, SEMESTERS_PER_YR);
    $.fn.dataTableExt.afnFiltering.push(
        function(oSettings, aData, iDataIndex) {
            let minDateFilter = new Date(fromDate.value).getTime();
            let maxDateFilter = new Date(toDate.value).getTime();
            let exactDateFilter = new Date(exactDate.value).getTime();
            let minSY = fromSchoolYear.value;
            let maxSY = toSchoolYear.value;
            let sem = semesterFilter.value;
            if (typeof aData._date == 'undefined') {
                aData._date = new Date(aData[2]).getTime();
            }
            if (minDateFilter && !isNaN(minDateFilter)) {
                if (aData._date < minDateFilter) {
                    return false;
                }
            }
            if (maxDateFilter && !isNaN(maxDateFilter)) {
                if (aData._date > maxDateFilter) {
                    return false;
                }
            }
            if (exactDateFilter && !isNaN(exactDateFilter)) {
                if (aData._date != exactDateFilter) {
                    return false;
                }
            }
            if(minSY && !isNaN(minSY)){
                if(aData[9] < minSY){
                    return false;
                }
            }
            if(maxSY && !isNaN(maxSY)){
                if(aData[9] > maxSY){
                    return false;
                }
            }
            if(sem && !isNaN(sem)){
                if(aData[10] != sem){
                    return false;
                }
            }
            return true;
        }
    );
    fromDate.addEventListener('change', onDateFilter);
    toDate.addEventListener('change', onDateFilter);
    exactDate.addEventListener('change', onDateFilter);
    fromSchoolYear.addEventListener('change', onDateFilter);
    toSchoolYear.addEventListener('change', onDateFilter);
    semesterFilter.addEventListener('change', onDateFilter);
}

function initViewByDateVars(identifiers = [], minYr, maxYr, SEMESTERS_PER_YR){
    fromSchoolYear = selectorFactory(identifiers[0]);
    toSchoolYear = selectorFactory(identifiers[1]);
    semesterFilter = selectorFactory(identifiers[2]);
    fromDate = selectorFactory(identifiers[3]);
    toDate = selectorFactory(identifiers[4]);
    exactDate = selectorFactory(identifiers[5]);
    populateComboBox(fromSchoolYear, maxYr, minYr, "From School Year");
    populateComboBox(toSchoolYear, maxYr, minYr, "To School Year");
    populateComboBox(semesterFilter, SEMESTERS_PER_YR, 1, "Semester");
}

function initViewByParticipant(tbl, index, append, trigger){
    initializePopOvers();
    dataTableContainsFilter(tbl, index, append, trigger);
}

function initViewByDepartmentInvolvement(tbl, index, append, trigger){
    initializePopOvers();
    dataTableExactFilter(tbl, index, append, trigger);
}

function initApproveReport(identifs = [], tbl){
    initializePopOvers();
    initializeDataTable(tbl);
    initApproveVars(identifs);
    for(let index=0; index<approveButtons.length; index++){
        approveButtons[index].addEventListener('click', onApprove);
        rejectButtons[index].addEventListener('click', onReject);
    }
    confirmButton.addEventListener('click', submit);
}

function initApproveVars(identifiers = []){
    confirmationMessage = selectorFactory(identifiers[0]);
    confirmButton = selectorFactory(identifiers[1]);
    hiddenForm = selectorFactory(identifiers[2]);
    hiddenReportId = selectorFactory(identifiers[3]);
    hiddenApproval = selectorFactory(identifiers[4]);
    approveButtons = selectorFactory(identifiers[5]);
    rejectButtons = selectorFactory(identifiers[6]);
}

function onDateFilter(event){
    dataTable.draw();
    disable();
}

function disable(){
    exactDate.disabled = (fromDate.value != "" || toDate.value != "") ? true : false ;
    fromDate.disabled = (exactDate.value != "");
    toDate.disabled = (exactDate.value != "");
}

function onApprove(event){
    approve = true;
    selectedId = this.getAttribute("data-id");
    let activityTitle = this.getAttribute("data-activity");
    confirmationMessage.innerHTML = `Are you sure you want to approve report: ${activityTitle}?`;
}

function onReject(event){
    approve = false;
    selectedId = this.getAttribute("data-id");
    let activityTitle = this.getAttribute("data-activity");
    confirmationMessage.innerHTML = `Are you sure you want to reject report: ${activityTitle}?`;;
}

function submit(){
    hiddenReportId.value = selectedId;
    hiddenApproval.value = approve;
    hiddenForm.submit();
}

function selectorFactory(identifier){
    return (document.getElementById(identifier) === null) ?
        document.getElementsByClassName(identifier)
        : document.getElementById(identifier);
}

function populateComboBox(selector, start, end, label){
    selector.innerHTML += `<option selected disabled>${label}</option>`;
    selector.innerHTML += '<option value="">All</option>';
    for(let counter = start; counter >= end; counter--){
        selector.innerHTML += `<option>${counter}</option>`;
    }
}

/**
 * jquery dependent functions
 */
function dataTableExactFilter(tblIdentifier, columnIndex, appendTo, eventType){
    $(tblIdentifier).DataTable({
        initComplete: function () {
            let column = this.api().column(columnIndex);
            $(appendTo).on(eventType, function (){
                let val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column.search( val ? '^'+val+'$' : '', true, false ).draw();
            });
        }
    });
}

function dataTableContainsFilter(tblIdentifier, columnIndex, appendTo, eventType){
    $(tblIdentifier).DataTable({
        initComplete: function () {
            let column = this.api().column(columnIndex);
            $(appendTo).on(eventType, function (){
                let val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column.search( val ? val: '', true, false ).draw();
            });
        }
    });
}

function initializeDataTable(tblIdentifier){
    return $(tblIdentifier).DataTable();
}

function initializePopOvers(){
    let popovers = $('[data-toggle="popover"]');
    popovers.popover();
    popovers.on('click', function(event){
        $('[data-toggle="popover"]').not(this).popover('hide');
    });
}