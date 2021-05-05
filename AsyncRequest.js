// Async data exchange cross browsing function
function asyncRequest() {
    let request;
    try {  // Is browser belong IE family
        request = new XMLHttpRequest(); //Yes
    }
    catch (e1) {
        try { // Is it IE 6+
            request = new ActiveXObject("Msxml2.XMLHTTP") //Yes
        }
        catch (e2) {
            try { // Is it IE 5?
                request = new ActiveXObject("Microsoft.XMLHTTP") //Yes
            }
            catch (e3) { // This browser don't apply async data exchange
                request = false
            }
        }
    }
    return request
}