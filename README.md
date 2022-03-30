# magento2

Create product Attribute Steps ( For redirecting disabled products ) :

    1. Create the module folder as Catalog ( Inside the Code Folder ).

    2. Create the etc/module.xml file.

    3. Create the registration.php file for register that module.

    4. Run the bin/magento setup:upgrade script to install the new module.

    5. Create Setup/Patch/Data/CustomCategory.php for creating product attribute to show all the category list

      Check the definition for source model inside CustomCategory.php file,
     'source' => 'Codem\Catalog\Model\Config\Source\ProductAttributes',

     After creating patch file Run the bin/magento s:up script && php bin/magento s:s:d -f 

     It will create new row in eav_attributes tables

   6. In admin panel -> Catalog->products->Add product->General Information → Showing list of categories

   7. We can select any category and Save.

 

Create global attribute for disabled product ( Redirect category ) :

Step 1: Create System.xml

Step 2: Set default value

Step 3: Flush Magento cache

Step 4: Get value from configuration

 
Step 1: Create System.xml

         The magento 2 system configuration page is divided logically in few parts: Tabs, Sections, Groups, Fields.

         The system.xml is located in etc/adminhtml folder of the module, we will create it a new Tab for our vendor “Category custom redirect ”, a new Section for our module catalog, a Group to contain some simple fields: redirect category.

File: app/code/Codem/Catalog/etc/adminhtml/system.xml

In that xml file need to refer source_model
<source_model>Codem\Catalog\Model\Config\Source\ProductAttributes</source_model>

The section may have many group and some other child elements:
Class: this value will be added as class for this element. You should you it if you want to make-up this element.
Label: the text title of this element
Tab: this’s a tab id. This tab element will let Magento know the tab which this section is belong to. This section will be placed under that tab
Resource: defined the ACL rule which the admin user must have in order to access this configuration.
Group: This element may have many field and some attributes which is same as Sections.
Fields: is the main path of this page. It will save the data which we want to setting. In this element, we focus on the type attribute. It will define how the element is when display. It can be: text, select, file… In this example we create 2 fields with type select and text. With each type we will define the child element for the field to make it work as we want.

Step 2: Set default value

File: app/code/Codem/Catalog/etc/config.xml
<default>
    <section>
        <group>
            <field>{value}</field>
        </group>
    </section>
</default>

Step 3: Flush Magento Cache

php bin/magento c:c

Step 4: Get value from configuration

$this->scopeConfig->getValue('Category/general/catredirect', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

 

Use Plugin to redirect disabled product page : 

Before plugin is used to change the input data of the original function 

After plugin is used to modify the original function result or allows to run the code after the original function execution.

Around plugin - changes the original function result based on the input data or disables the execution of the original function.

 

Working Flow : 
1.Get the redirect_category product attribute value
2.Get the global redirect category attribute value
3.Check product attribute. If it has product redirect_category attribute will direct the page based on product attribute otherwise it will redirect based on global configured category
