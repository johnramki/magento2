# magento2

Create Category Attribute Steps :

   1. Create the module folder as Catalog ( Inside the Code Folder ).

   2. Create the etc/module.xml file.

   3. Create the registration.php file for register that module.

   4. Run the bin/magento setup:upgrade script to install the new module.

   5. Create Setup/Patch/CreateCustomAttr.php for creating category attribute

       We have to add attribute using, Magento\Catalog\Model\Category::ENTITY class.

       Get the CMS Block option, we need to use “source_model” to define our CMS block collection and iterate through all the cms block and set option value.

      Check the definition for source model inside InstallData.php file,
     ‘source’ => ‘Magento\Catalog\Model\Category\Attribute\Source\Page’

   6. We need to create a category_form.xml file 

        category_form.xml used to define our attribute in Admin Category page. magento category page follows the ui_component pattern to display all the category attribute.(app/code/Codem/Category/view/adminhtml/ui_component/category_form.xml)

   7. After creating patch file Run the bin/magento s:up script && php bin/magento s:s:d -f 

   8. It will create new row in eav_attributes tables

   9. In admin panel -> showing new category attribute field ( Futured category block with select option - listing all cms static blocks )

 

Showing Custom Block in frontend :

 1.  create a layout file in your extension     NameSpace/ModuleName/view/frontend/layout/Category/catalog_category_view.xml

 2. Create layout for showing newly created attribute  ( template/category/bottom-cms.phtml)
