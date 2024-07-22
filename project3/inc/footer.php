<style><?php include '../settes/bootstap/css/bootstrap.min.css' ?></style>
</div><div class="col-sm-4">
            <div class="d-flex justify-content-center align-content-center">
                <div>
                    <div class="sidebar-module about p-3 mb-3 ">
                        <h4>About</h4>
                        <p>Lorem ipsum dolor sit amet consectetur <em>adipisicing elit.</em></p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Categories</h4>
                        <?php if($categories) :?>
                        <ol>
                            <?php foreach($categories as $category) :?>
                            <li><a href="posts.php?category=<?php echo $category['id']; ?>"><?php echo $category['name'];?></a></li>
                            <?php endforeach ;?>
                           
                        </ol>
                        <?php else : ?>
                        <p>there are not categories yet</p>  
                        <?php endif ;?>  
                    </div>
                </div>
            </div>
        </div>
</div>
<a class="btn btn-dark my-5" href="#">Back To Top</a>
<footer class="my-5">
    <p class="d-flex justify-content-cinter">PHP Lovers Blog &copy; 2024</p>
</footer>
    </div>
</body>
</html>