/* Redisplay labels */

let acfLabels = document.querySelectorAll(".acf-label");

// IF THE SIBLING .acf-input has .acf-fields, don't do
// TODO: Limit these

let acfInputs = document.querySelectorAll(":not(.clones) .acf-input");
console.log(acfInputs.length);

acfInputs.forEach(function (inp) {
    // GENERALLY, IF THEY DON'T HAVE SUB FIELDS, THEY SHOULD DISPLAY THE LABEL
    if (!inp.querySelector(".acf-field") && inp.childNodes.length > 1) {
        if (inp.previousElementSibling) {
            // inp.previousElementSibling.style.display = "block";
            inp.previousElementSibling.classList.add(
                "kivvi-acf-header-display"
            );
            inp.previousElementSibling.classList.add("kivvi-no-field");
            inp.previousElementSibling.classList.add(
                "length-" + inp.childNodes.length
            );
        }
    }
    if (
        inp.firstElementChild &&
        inp.firstElementChild.classList.contains("acf-repeater")
    ) {
        // inp.previousElementSibling.style.display = "block";
        inp.previousElementSibling.classList.add("kivvi-acf-header-display");
        inp.previousElementSibling.classList.add("kivvi-repeater");
    }
});

/*

<div class="acf-input">
<div class="acf-repeater -table" data-min="0" data-max="0">
			<input type="hidden" name="acf[field_6287d97621421][row-0][field_6287d9e721422][row-0][field_628d6100b1e70][field_628d607c2ae46][field_628d608e2ae47]" value=""><table class="acf-table">
	
					<thead>
			<tr>
									<th class="acf-row-handle"></th>
								
									<th class="acf-th" data-name="alyve_typing_page_header_header_text" data-type="text" data-key="field_628d61945d455" style="width: 100%;">
						<label>Header Text</label>											</th>
				
									<th class="acf-row-handle"></th>
							</tr>
		</thead>
		
	<tbody class="ui-sortable">
						<tr class="acf-row
							" data-id="row-0">
				
									<td class="acf-row-handle order ui-sortable-handle" title="Drag to reorder">
												<span>1</span>
					</td>
								
								
				<td class="acf-field acf-field-text acf-field-628d61945d455" data-name="alyve_typing_page_header_header_text" data-type="text" data-key="field_628d61945d455">
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="acf-field_6287d97621421-row-0-field_6287d9e721422-row-0-field_628d6100b1e70-field_628d607c2ae46-field_628d608e2ae47-row-0-field_628d61945d455" name="acf[field_6287d97621421][row-0][field_6287d9e721422][row-0][field_628d6100b1e70][field_628d607c2ae46][field_628d608e2ae47][row-0][field_628d61945d455]" value="Reimagining Rehab"></div></div>
</td>
					
								
									
										<td class="acf-row-handle remove">
						<a class="acf-icon -plus small acf-js-tooltip hide-on-shift" href="#" data-event="add-row" title="Add row"></a>
						<a class="acf-icon -duplicate small acf-js-tooltip show-on-shift" href="#" data-event="duplicate-row" title="Duplicate row"></a>
						<a class="acf-icon -minus small acf-js-tooltip" href="#" data-event="remove-row" title="Remove row"></a>
					</td>
								
			</tr>
						<tr class="acf-row
							" data-id="row-1">
				
									<td class="acf-row-handle order ui-sortable-handle" title="Drag to reorder">
												<span>2</span>
					</td>
								
								
				<td class="acf-field acf-field-text acf-field-628d61945d455" data-name="alyve_typing_page_header_header_text" data-type="text" data-key="field_628d61945d455">
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="acf-field_6287d97621421-row-0-field_6287d9e721422-row-0-field_628d6100b1e70-field_628d607c2ae46-field_628d608e2ae47-row-1-field_628d61945d455" name="acf[field_6287d97621421][row-0][field_6287d9e721422][row-0][field_628d6100b1e70][field_628d607c2ae46][field_628d608e2ae47][row-1][field_628d61945d455]" value="Recalibrating Motion"></div></div>
</td>
					
								
									
										<td class="acf-row-handle remove">
						<a class="acf-icon -plus small acf-js-tooltip hide-on-shift" href="#" data-event="add-row" title="Add row"></a>
						<a class="acf-icon -duplicate small acf-js-tooltip show-on-shift" href="#" data-event="duplicate-row" title="Duplicate row"></a>
						<a class="acf-icon -minus small acf-js-tooltip" href="#" data-event="remove-row" title="Remove row"></a>
					</td>
								
			</tr>
						<tr class="acf-row
							" data-id="row-2">
				
									<td class="acf-row-handle order ui-sortable-handle" title="Drag to reorder">
												<span>3</span>
					</td>
								
								
				<td class="acf-field acf-field-text acf-field-628d61945d455" data-name="alyve_typing_page_header_header_text" data-type="text" data-key="field_628d61945d455">
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="acf-field_6287d97621421-row-0-field_6287d9e721422-row-0-field_628d6100b1e70-field_628d607c2ae46-field_628d608e2ae47-row-2-field_628d61945d455" name="acf[field_6287d97621421][row-0][field_6287d9e721422][row-0][field_628d6100b1e70][field_628d607c2ae46][field_628d608e2ae47][row-2][field_628d61945d455]" value="Rebuilding Lives"></div></div>
</td>
					
								
									
										<td class="acf-row-handle remove">
						<a class="acf-icon -plus small acf-js-tooltip hide-on-shift" href="#" data-event="add-row" title="Add row"></a>
						<a class="acf-icon -duplicate small acf-js-tooltip show-on-shift" href="#" data-event="duplicate-row" title="Duplicate row"></a>
						<a class="acf-icon -minus small acf-js-tooltip" href="#" data-event="remove-row" title="Remove row"></a>
					</td>
								
			</tr>
						<tr class="acf-row
				 acf-clone			" data-id="acfcloneindex" style="">
				
									<td class="acf-row-handle order ui-sortable-handle" title="Drag to reorder">
												<span>1</span>
					</td>
								
								
				<td class="acf-field acf-field-text acf-field-628d61945d455" data-name="alyve_typing_page_header_header_text" data-type="text" data-key="field_628d61945d455">
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="acf-field_6287d97621421-row-0-field_6287d9e721422-row-0-field_628d6100b1e70-field_628d607c2ae46-field_628d608e2ae47-acfcloneindex-field_628d61945d455" name="acf[field_6287d97621421][row-0][field_6287d9e721422][row-0][field_628d6100b1e70][field_628d607c2ae46][field_628d608e2ae47][acfcloneindex][field_628d61945d455]" disabled=""></div></div>
</td>
					
								
									
										<td class="acf-row-handle remove">
						<a class="acf-icon -plus small acf-js-tooltip hide-on-shift" href="#" data-event="add-row" title="Add row"></a>
						<a class="acf-icon -duplicate small acf-js-tooltip show-on-shift" href="#" data-event="duplicate-row" title="Duplicate row"></a>
						<a class="acf-icon -minus small acf-js-tooltip" href="#" data-event="remove-row" title="Remove row"></a>
					</td>
								
			</tr>
				</tbody>
</table>
				
	<div class="acf-actions">
		<a class="acf-button button button-primary" href="#" data-event="add-row">Add Row</a>
	</div>
			
		</div>
			</div>
            */
