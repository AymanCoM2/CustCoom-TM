<script>
    // 1 , Just Show Toastr and Call the Function to Call the api 
    let userCardCode = $('#what_if_card_code').val();
    $('#load_what_if').on('click', function() {
        Toastify({
            text: "Customer is Loaded :" + userCardCode,
            className: "info",
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            }
        }).showToast();
        loadDataFromLink(userCardCode);
    });

    // 2 ,  Make the Request and then Get the Data From the API 
    function loadDataFromLink(userCardCode) {
        $.ajax({
            type: 'GET',
            url: "{{ route('load-what-if-data') }}",
            data: {
                cardCode: userCardCode
            },
            success: function(data) {
                // console.log('Result  : ' + data.result);
                fillTheForm(data.result);
                // alert('Button is Clicked ' + userCardCode);
            },
            error: function(err) {
                console.log('Error : ' + err);
            }
        });
    } // End of loadDataFromLink

    // 3 
    function fillTheForm(resultJsonData) {
        let jsonDataObject = JSON.parse(resultJsonData);
        jsonDataObject.forEach(element => {
            // console.log(element.fieldName, element.newValue);
            let els = document.getElementsByName(element.fieldName);
            // if (els.length > 0) { // IT IS ALWAYS Bigger than 0 
            // Check the type of the first element in the collection (index 0)
            let el = els[0];
            if (el.type === "radio") {
                // For radio buttons, loop through all elements with the same name
                for (let i = 0; i < els.length; i++) {
                    if (els[i].value === element.newValue) {
                        els[i].checked = true;
                        // let event = new Event("change", {
                        //     bubbles: true,
                        //     cancelable: true
                        // });
                        // el.dispatchEvent(event);
                    } else {
                        els[i].checked = false;
                    }
                }
            } else {
                el.value = element.newValue;
                let event = new Event("change", {
                    bubbles: true,
                    cancelable: true
                });
                el.dispatchEvent(event);
            }
        });
        // Those events Will not be dispached HERE BUT will be dispached Upon clicking alert 
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const inputElements = document.querySelectorAll('input');

        [...radioButtons, ...checkboxes, ...inputElements].forEach(function(element) {
            element.dispatchEvent(change);
        });
        // Those events Will not be disached HERE BUT will be dispached Upon clicking alert 
    } // End Of fillTheForm
</script>
