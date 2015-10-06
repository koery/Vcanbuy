function addNewPersonRow(url,img){
 var bodyObj=document.getElementById("fm2_table_body");  
 bodyObj.style.display = '';
    if(bodyObj==null)   
    {  
        return;  
    }  
    var rowCount = bodyObj.rows.length;  
    var newRow = bodyObj.insertRow(rowCount++);   
    //newRow.id='tr'+rowCount;
	//newRow.setAttribute('onClick','setTrProperty(this)');
    var firstCell = newRow.insertCell(0);
    var secondCell = newRow.insertCell(1);
    //the 6 row codes after this row are format setting, you need not care about them
    firstCell.className = "bgc_tt short";  //this is a css
    secondCell.className = "bgc_tt short";
    firstCell.style.textAlign = "center";
    secondCell.style.textAlign = "center";
    firstCell.innerHTML = "<img src='"+url +img+"' height='200' /><input type='hidden' name='filename[]' value='"+img+"' />";
    secondCell.innerHTML="<a href='javascript:void(0)' onclick='removeNewPersonRow(this)'>删除</a>&nbsp;&nbsp;"
    		+"<a href='javascript:void(0)' onclick='moveUp(this)'>上移</a>&nbsp;&nbsp;" 
    		+"<a href='javascript:void(0)' onclick='moveDown(this)'>下移</a>&nbsp;&nbsp;" ;
 }

function removeNewPersonRow(inputobj){  
    if(inputobj==null) return;  
    var parentTD = inputobj.parentNode;  //parentNode是父标签的意思，如果你的TD里用了很多div控制格式，要多调用几次parentNode
    var parentTR = parentTD.parentNode;  
    var parentTBODY = parentTR.parentNode;  
    parentTBODY.removeChild(parentTR);  
}



function moveDown(obj){
	var tr = obj.parentNode.parentNode;
	var tbody = tr.parentNode;
	var tb = tbody.parentNode;
	var rowIdx = 0;
	for ( var i = 0; i < tb.rows.length; i++) {
		if (tb.rows[i] == tr) {
			rowIdx = i;
			break;
		}
	}
	if (rowIdx == tb.rows.length - 1)
		return;
	var nextTr = tb.rows[rowIdx + 1];
	var nextNextObj = nextTr.nextSibling;
	tbody.removeChild(tr);
	if (nextNextObj){
		tbody.insertBefore(tr, nextNextObj);
	}else{
		tbody.appendChild(tr);
	}
}

function moveUp(obj){
    var tr = obj.parentNode.parentNode;
	var tbody = tr.parentNode;
	var tb = tbody.parentNode;
	var rowIdx = 0;
	for ( var i = 0; i < tb.rows.length; i++) {
		if (tb.rows[i] == tr) {
			rowIdx = i;
			break;
		}
	}
	if (rowIdx == 1)
		return;
	var preTr = tb.rows[rowIdx - 1];
	var nextNextObj = tr.nextSibling;
	tbody.removeChild(preTr);
	if (nextNextObj){
		tbody.insertBefore(preTr, nextNextObj);
	}else{
		tbody.appendChild(preTr);
	}
}
