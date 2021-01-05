<?php
include "./templates/header.php";
?>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input class="input--style-4" type="text" name="full name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Designation</label>
                                    <div class="js-select-simple select--no-search form-control">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">choose</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Editor</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<?php
include "./templates/footer.php";
?>