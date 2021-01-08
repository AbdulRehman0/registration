<?php

if(isset($_POST["submit"])){
    $postString=$_POST["arr"];
    $postArray=explode(",",$postString);
    if(checkArray($postArray)){
        echo "valid Array";
    }else{
        echo "invalid Array";
    }
}
function checkArray($data){
    for($j=0; $j < count($data); $j++){
        for ($i=$j+1; $i < count($data); $i++) { 
            if(($data[$j]-$data[$i]) <= 0){
                return false;
            }
        }
    }
    return true;
}
?>
<form method="POST">
                        
                        
                        
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Comma separated values</label>
                                    <input type="text" class="input--style-4" id="exampleInputPassword1" name="arr" placeholder="Password" value="<?php if(isset($_POST["submit"])) echo $postString;?>" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Submit</button>
                        </div>
                    </form>