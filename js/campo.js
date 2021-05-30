$(document).ready(function() {
  $('#btnDel').attr('disabled','disabled');
  $('#btnAdd').click(function() {
    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
    var newNum = new Number(num + 1); // the numeric ID of the new input field being added
 	var num2 = $('.clonedInput2').length; // how many "duplicatable" input fields we currently have
    var newNum2 = new Number(num2 + 1);

    // create the new element via clone(), and manipulate it's ID using newNum value
    var newElem = $('#diainput' + num).clone().attr('id', 'diainput' + newNum);
    var newElem2 = $('#horainput' + num2).clone().attr('id', 'horainput' + newNum2);
 
    // manipulate the name/id values of the input inside the new element
    newElem.children(':last').attr('id', 'dia' + newNum).attr('name', 'dia' + newNum);
    newElem2.children(':last').attr('id', 'hora' + newNum2).attr('name', 'hora' + newNum2);

    // insert the new element after the last "duplicatable" input field
    $('#horainput' + num2).after(newElem)
    $('#diainput' + (num+1)).after(newElem2)
 
    // enable the "remove" button
    $('#btnDel').attr('disabled',false);
 
    // business rule: you can only add 10 names
    if (newNum == 5)
      $('#btnAdd').attr('disabled','disabled');
  });
 
  $('#btnDel').click(function() {
    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
    $('#diainput' + num).remove(); // remove the last element
 	var num2 = $('.clonedInput2').length; // how many "duplicatable" input fields we currently have
    $('#horainput' + num2).remove(); // remove the last element
 

    // enable the "add" button
    $('#btnAdd').attr('disabled',false);
 
    // if only one element remains, disable the "remove" button
    if (num-1 == 1)
      $('#btnDel').attr('disabled','disabled');
  });
 
});