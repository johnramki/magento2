# magento2

Create Product Attribute Steps :

1   Create the module folder as Catalog ( Inside the Code Folder ).

2   Create the etc/module.xml file.

3   Create the registration.php file for register that module.

4   Run the bin/magento setup:upgrade script to install the new module.

5   Create Patch/Data/CreateCustomAttr.php for creating attribute

6   After creating patch file Run the bin/magento s:up script && php bin/magento s:s:d -f 

7   It will create new row in eav_attributes tables

8   In admin panel -> showing new attribute field

Showing attribute in frontend catalog view page :

    1. Create a layout file in your extension     NameSpace/ModuleName/view/frontend/layout/catalog_product_view.xml

    2. Create layout for showing newly created attribute 
