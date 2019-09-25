<section class="post-page container-fluid h-50 shadow-lg">
        <form method="POST" class="container mx-auto">
            <div class="container pt-5">
                <div class="form-group">
                  <label for="inputTitle">Title :</label>
                  <input type="text" required="required" name="title" id="inputTitle" class="shadow-lg form-control mx-sm-3" aria-describedby="TextInput">
                </div>
                <div class="form-group">
                    <label for="inputText">Text :</label>
                    <textarea type="text" required="required" name="text" id="inputText" class="shadow-lg form-control mx-sm-3" aria-describedby="TextInput"></textarea>
                </div>
                <input type="submit" name="send" value="Send" class="shadow-lg container btn btn-light">
            </div>
        </form>
    </section>
