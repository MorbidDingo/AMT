let editor;
var inputs = $("#input");
var filename = $("#name").val();

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/cobalt");
    editor.session.setMode("ace/mode/python");
}

$("#run").click(function(){
    $.ajax({
        url: "server.php",
        method: "POST",
        data: {
            code: editor.getSession().getValue(),
            input: inputs.val(),
            file: filename
        },
        success: function(response){
            $(".code_output").text(response);
        }
    })

})

// $("#save").click(function()
// {
//     $.ajax({
//         url: "save.php",
//         method: "POST",
//         data: {
//             code: editor.getSession().getValue(),
//             file: filename.val()
//         },
//         success: function(response){
//             $(".code_output").text('File saved successfully');
//         }          
//     })
// })