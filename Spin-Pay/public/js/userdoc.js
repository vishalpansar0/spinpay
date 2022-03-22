
// const aadharFileInput = document.getElementById('aadharfile');
// aadharFileInput.onchange = () => {
//     const selectedFile = aadharFileInput.files[0];
//     $('#hh').html(selectedFile['name']);
// }
// const panFileInput = document.getElementById('panfile');
// panFileInput.onchange = () => {
//     const selectedFile = panFileInput.files[0];
//     $('#hh').html(selectedFile['name']);
// }
// const payslipFileInput1 = document.getElementById('payslipfile1');
// payslipFileInput1.onchange = () => {
//     const selectedFile = payslipFileInput1.files[0];
//     $('#hh').html(selectedFile['name']);
// }
// const payslipFileInput2 = document.getElementById('payslipfile2');
// payslipFileInput2.onchange = () => {
//     const selectedFile = payslipFileInput2.files[0];
//     $('#hh').html(selectedFile['name']);
// }
// const payslipFileInput3 = document.getElementById('payslipfile3');
// payslipFileInput3.onchange = () => {
//     const selectedFile = payslipFileInput3.files[0];
//     $('#hh').html(selectedFile['name']);
// }
// const bankstatementFileInput = document.getElementById('bankstatementfile');
// bankstatementFileInput.onchange = () => {
//     const selectedFile = bankstatementFileInput.files[0];
//     $('#hh').html(selectedFile['name']);
// }


$(document).ready(function () {



    // error function
    function errormsg(div, str) {
        $(div).html(str);
        $(div).css('display', 'block');
    }


    // error function block hide
    function hideerror(div) {
        $(div).css('display', 'none');
    }


    //making document session none
    function hideDiv(div, nextDiv) {
        $(div).css('display', 'none');
        $(nextDiv).css('display', 'block');
    }


    // Aadhar Document Upload
    $('#aadharUploadBtn').click(function () {
        $("#aadharnum").val() == "" ? errormsg('#erroraadharnum', 'this field cannot be blank') : hideerror('#erroraadharnum');
        $('#aadharfile').get(0).files.length == 0 ? errormsg('#erroraadharimage', 'Please Upload a file') : hideerror('#erroraadharimage');
        

        var formdata = new FormData();
        formdata.append('file',$('#aadharfile').get(0).files.name);
        console.log(formdata);


        aadharnum = $('#aadharnum').val();
        // aadharimage = formdata;
        // console.log(aadharimage);
        var aadhardata = {
            user_id: 1,
            master_document_id: 1,
            document_number: aadharnum,
            document_image: aadharimage
        };
        $.ajax({
            url: "http://localhost:8000/api/aadhar",
            type: 'post',
            dataType: 'json',
            data: aadhardata,
            success: function (result) {
                console.log(result);
                if (result['status'] == 200) {
                    hideDiv('aadharUploadMainDiv', 'panUploadMainDiv');
                }
                else {
                    errormsg('#error', result['message'])
                }
            }
        });
    });



    // Pan Document Upload
    $('#panUploadBtn').click(function () {
        $("#pannum").val() == "" ? errormsg('#errorpannum', 'this field cannot be blank') : hideerror('#errorpannum');
        $('#panfile').get(0).files.length == 0 ? errormsg('#errorpanimage', 'Please Upload a file') : hideerror('#errorpanimage');
        pannum = $("#pannum").val();
        panimage = $('#panfile').val();
        var pandata = {
            user_id: user_id,
            master_document_id: 2,
            document_number: pannum,
            document_image: panimage
        };
        $.ajax({
            url: "api/pan",
            type: 'post',
            dataType: 'json',
            data: pandata,
            success: function (result) {
                console.log(result);
                if (result['status'] == 200) {
                    hideDiv('panUploadMainDiv', 'payslipUploadMainDiv');
                }
                else {
                    errormsg('#error', result['message'])
                }
            }
        });
    });



    // PaySlip Document Upload
    $('#payslipUploadBtn1').click(function () {
        $('#payslipfile1').get(0).files.length == 0 ? errormsg('#errorpayslip1', 'Please Upload a file') : hideerror('#errorpayslip1');
        payslipfile1 = $('#payslipfile1').val();
        var payslipdata = {
            user_id: user_id,
            master_document_id: 3,
            document_number: 31,
            document_image: payslipfile1
        };
        $.ajax({
            url: "api/payslip",
            type: 'post',
            dataType: 'json',
            data: payslipdata,
            success: function (result) {
                console.log(result);
                if (result['status'] == 200) {
                    hideDiv('payslip1', 'payslip2');
                }
                else {
                    errormsg('#error', result['message'])
                }
            }
        });
    });
    $('#payslipUploadBtn2').click(function () {
        $('#payslipfile2').get(0).files.length == 0 ? errormsg('#errorpayslip2', 'Please Upload a file') : hideerror('#errorpayslip2');
        payslipfile2 = $('#payslipfile2').val();
        var payslipdata = {
            user_id: user_id,
            master_document_id: 3,
            document_number: 32,
            document_image: payslipfile2
        };
        $.ajax({
            url: "api/payslip",
            type: 'post',
            dataType: 'json',
            data: payslipdata,
            success: function (result) {
                console.log(result);
                if (result['status'] == 200) {
                    hideDiv('payslip2', 'payslip3');
                }
                else {
                    errormsg('#error', result['message'])
                }
            }
        });
    });
    $('#payslipUploadBtn3').click(function () {
        $('#payslipfile3').get(0).files.length == 0 ? errormsg('#errorpayslip3', 'Please Upload a file') : hideerror('#errorpayslip3');
        payslipfile3 = $('#payslipfile3').val();
        var payslipdata = {
            user_id: user_id,
            master_document_id: 3,
            document_number: 33,
            document_image: payslipfile3
        };
        $.ajax({
            url: "api/payslip",
            type: 'post',
            dataType: 'json',
            data: payslipdata,
            success: function (result) {
                console.log(result);
                if (result['status'] == 200) {
                    hideDiv('payslip3', 'bankstatementUploadMainDiv');
                }
                else {
                    errormsg('#error', result['message'])
                }
            }
        });
    });








    // Bank Statement Document Upload
    $('#bankstatementUploadBtn').click(function () {
        $('#bankstatementfile').get(0).files.length == 0 ? errormsg('#errorbankstatement', 'Please Upload a file') : hideerror('#errorbankstatement');
        bankstatementfile = $('#bankstatementfile').val();
        var bankstatement = {
            user_id: user_id,
            master_document_id: 4,
            document_number: 41,
            document_image: bankstatementfile
        };
        $.ajax({
            url: "api/pan",
            type: 'post',
            dataType: 'json',
            data: bankstatement,
            success: function (result) {
                console.log(result);
                if (result['status'] == 200) {
                    location.href = "http://localhost:8000/signin";
                }
                else {
                    errormsg('#error', result['message'])
                }
            }
        });
    });
});










