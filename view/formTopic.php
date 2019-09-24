<section class="post-page container-fluid h-50">
        <form method="POST" class="container mx-auto">
            <div class="container pt-5">
                <div class="form-group">
                  <label for="inputTitle">Title :</label>
                  <input type="text" required="required" name="title" id="inputTitle" class="form-control mx-sm-3" aria-describedby="TextInput">
                </div>
                <div class="form-group">
                    <label for="inputText">Text :</label>
                    <textarea type="text" required="required" name="text" id="inputText" class="form-control mx-sm-3" aria-describedby="TextInput"></textarea>
                </div>
                <input type="submit" name="send" value="Send" class="container btn btn-light">
            </div>
        </form>
    </section>
