<?php 
    // Fake Data Mails table
    $insertMails = "INSERT INTO mails (sender_id, sender_name, sender_email, sender_request, reg_date) 
            VALUES 
                (91, 'Angie Stede', 'astede0@t.co', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2023-03-12'),
                (11, 'Benedicta Attac', 'battac1@google.com', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2024-05-02'),
                (100, 'Hedi Leall', 'hleall2@wordpress.com', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2024-06-08'),
                (19, 'Ulrica Dyzart', 'udyzart3@webnode.com', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.', '2024-10-15'),
                (24, 'Gaby Flatman', 'gflatman4@newsvine.com', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2023-11-25'),
                (51, 'Colline Dillingham', 'cdillingham5@webs.com', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '2024-02-05'),
                (33, 'Claire Marsland', 'cmarsland6@moonfruit.com', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2023-12-22'),
                (42, 'Tan Gronaller', 'tgronaller7@sun.com', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2024-01-09'),
                (67, 'Beryle Lemarie', 'blemarie8@ycombinator.com', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2024-11-08'),
                (69, 'Caroline Chetham', 'cchetham9@cbc.ca', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2024-09-23'),
                (22, 'Kelsey Boome', 'kboome0@so-net.ne.jp', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2024-08-16'),
                (21, 'Terza Rudinger', 'trudinger1@wired.com', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', '2023-11-04'),
                (30, 'Wilmette Winward', 'wwinward2@themeforest.net', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2024-07-17'),
                (1, 'Gearard Rentoll', 'grentoll3@jigsy.com', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2024-10-17'),
                (84, 'Edwina Michie', 'emichie4@joomla.org', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2024-09-22'),
                (71, 'Sybil Heelis', 'sheelis5@ibm.com', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', '2024-10-14'),
                (15, 'John Regi', 'jregi6@army.mil', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '2024-01-04'),
                (37, 'Anny Ivashechkin', 'aivashechkin8@jimdo.com', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', '2024-03-13')
            ";
        
    if ($conn->query($insertMails) === FALSE) {
        echo "Multiple insert in Mails_tb Failed!" . mysqli_connect_error();
    } else {
        echo "Multiple in Mails Inserted... ";        
    }

    $insertUsers = "INSERT INTO registerLogin (user_id, user_name, user_email, user_password, reg_date) 
            VALUES 
                (1, 'Abbey Dugall', 'adugall0@t.co', '$2a$04$csjy9jecuf6WmcpNiOG4ou4hBMoR.ZP.XKdv8x83W9IfmPXEQ1nT2', '2023-11-15'),
                (2, 'Hilary Dotson', 'hdotson1@hatena.ne.jp', '$2a$04$75jBfu6bDfmVWZEJBiFx/ODbLb1t3HBUc2KLpuLa0UiB6YMDskumS', '2024-02-28'),
                (3, 'Adrian Liggins', 'aliggins2@canalblog.com', '$2a$04$lj/DzIpFCstqFVGECWkFeu8NkWSUJnwi269JtyNvvK99CYnnoT8wO', '2024-05-28'),
                (4, 'Maxie Mobbs', 'mmobbs3@clickbank.net', '$2a$04$eGKb9v5LJZM0wk5veM4/Lu36IiYe.YB6H6LR7G52zTGkr8bgqJN4O', '2024-02-22'),
                (5, 'Aloin Ebhardt', 'aebhardt4@topsy.com', '$2a$04$220bLtOpYynd0nfm8UBCF.9eFQGZ/SidkW1DUe0R4emHnqLs2v8GK', '2024-04-17'),
                (6, 'Christiana Vowell', 'cvowell5@bluehost.com', '$2a$04$vC/IuFXLxahAMXexTga/CugV5crhQAE4orLkkulg4FaZYuL0Fauum', '2023-12-07'),
                (7, 'Carmina Lippiatt', 'clippiatt6@cmu.edu', '$2a$04$Sp210vd/2ZNa.ALaIENbjuvXmPyCtXau/6Ew3MHqs7VOqA5kn6KrG', '2023-11-17'),
                (8, 'Padget Faithorn', 'pfaithorn7@illinois.edu', '$2a$04$K/n0r.9CrR8uEwcCqWJeX.iO6WGzMF3WtYiR.eaiJ5VUrcr0joPjK', '2024-05-18')
            ";
        if ($conn->query($insertUsers) === FALSE) {
            echo "Multiple insert in registerLogin_tb Failed!" . mysqli_connect_error();
        } else {
            echo "Multiple in registerLogin_tb Inserted... ";        
        }
    
          
?>