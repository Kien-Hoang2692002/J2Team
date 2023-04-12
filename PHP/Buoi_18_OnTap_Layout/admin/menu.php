<ul>
    <li>
        <a href="../manufacturers">
            Quản lý nhà sản xuất
        </a>
    </li>
</ul>

    <!-- In lỗi ra màn hình nếu có -->
    <?php
        if(isset($_GET['loi'])){ 
    ?>
        <span style="color:red">
            <?php
                echo $_GET['loi'];
            ?>
        </span>
              
    <?php      
        }
    ?>

        <!-- In ra màn hình thành công -->
        <?php
        if(isset($_GET['success'])){ 
    ?>
        <span style="color:green">
            <?php
                echo $_GET['success'];
            ?>
        </span>
              
    <?php      
        }
    ?>

