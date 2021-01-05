<?php
include "./templates/header.php";
?>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" action="./controllers/UserController.php">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input class="input--style-4" type="text" name="full-name" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="input--style-4" id="exampleInputPassword1" name="pass1" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Confirm Password</label>
                                    <input type="password" class="input--style-4" id="exampleInputPassword2" name="pass2" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label">Designation</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select class="input--style-4" name="designation">
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
                            <button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Submit</button>
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