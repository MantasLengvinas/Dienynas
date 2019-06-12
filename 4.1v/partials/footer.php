<script>
                let arrowContainer = document.getElementById("arrowContainer");
                let isarrowDown = true;
                let arrowDown = "fa-caret-down";
                let arrowUp = "fa-caret-up";

                function Dropdown() {
                    document.getElementById("myDropdown").classList.toggle("hidden");
                    
                    if(isarrowDown){
                        arrowContainer.classList.remove(arrowDown);
                        arrowContainer.classList.add(arrowUp);
                        isarrowDown = false;
                    }else{
                        arrowContainer.classList.remove(arrowUp);
                        arrowContainer.classList.add(arrowDown);
                        isarrowDown = true;
                    }

                }

                // Close the dropdown if the user clicks outside of it
                // window.onclick = function(event) {
                // if (!event.target.matches('.dropbtn')) {

                //     var dropdowns = document.getElementsByClassName("dropdown-content");
                //     for (var i = 0; i < dropdowns.length; i++) {
                //     var openDropdown = dropdowns[i];
                //     if (openDropdown.classList.contains('show')) {
                //         openDropdown.classList.remove('show');
                //         openDropdown.style.zIndex = "10";
                //     }
                //     }
                // }
                // }
        </script>
        <!-- <script src="../js/loadTable/loader.js"></script> -->

        <!-- <script>
            let sel = document.getElementByClassName("selects").getElementByTagName("li");
            sel.addEventListener("click", function(){
                sel.setAttribute("class", "is-selected");
            });
        </script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        

<div id="footer_section" class="row" style="margin-top:10px;margin-bottom:10px;">
    <div class="col-md-14">
        <div style="background-color:white;height:30px;">
            <div id="footer">
    <p>© 2019 JML. Visos teisės saugomos. v4.2</p>
</div>
        </div>
    </div>
</div>
<div id="modal_dialog_window" class="hidden" style="z-index:9999">

</div>

<script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.js"></script>
<script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.js"></script>
<script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.sound.js"></script>
<script src="../scripts/timer.js"></script>