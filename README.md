
## Before Test The Application
    Rename The Database in ENV file .
    please run the  following command in the terminal :
        php artisan migrate --seed

## Laravel Artisan CLI
    
    Product Commands :
    
        To Create Product from terminal run the following command with arguments :
            php artisan product:create {name} {description} {price} {category_id} {image?}
            
        To Delete Product by id from terminal :
            php artisan product:delete {id}
            
    Category Commands :
    
        To Create Category from terminal run the following command with arguments :
            php artisan category:create {name} {parent_category?}
            
        To Delete Product by id from terminal :
            php artisan category:delete {id}
    

