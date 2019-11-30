# INFI Framework with CMS

A mini MVC framework built in PHP.

## About this project

`infi-framework` is a continously developed framework which is purely developed in PHP using MVC structure. The AIM of this project is to train the developer and to use it in small project. This project is purely built for the opensource community which mean you can fork it and extend this project.

This project goes even further and attempts to integrate top features as seen in real-life apps.

Give this project a big ol' 🌟 star motivates me to work on new features.

Check out my profile (https://tejasrana.com/).

## Using this project

The goal is not to use this project as it, but to implement your own version.

### Requirement

This project relies on the following components. Some of them are **optional** and some may be replaced by others with similar functionalities.

#### Dependencies

This project uses the following dependencies:

- `PHP` - v5.6 and above.
- `MySQL/MariaDB` - For DB.
- `Apache2` - Apache or ngix.
- `MOD Rewrite` - Apache extension for the Clean URL.
- `MOD Cache` - To chache the XML for the VQMOD.

## Development

`infi-framework` is a long-term developing project. There is no constraint on numbers of features. I continuously accepts feature proposals and am actively developing and expanding functionalities.

### Features

This project is to create a small Framework which can be use in any type of domain such as Blogs, eCommerce, B2B, B2C or any kind of domain which you can think. The main feature of this framework is `VQ MOD` which mean you can modify any line of code of this framework which physically modifing the file. You just have to write the XML code. 

For Example:

`<?xml version="1.0" encoding="UTF-8"?>`
`<modification>`
    `<id>Demo Admin End XML</id>`
    `<version>1.0</version>`
    `<vqmver>2.X</vqmver>`
    `<author>Tejas Rana</author>`
    `<file name="admin/Controllers/home.php">`
       ` <operation info="$sql = new sql();">`
           `<search position="after"><![CDATA[`
        `$sql->connect();`
           ` ]]></search>`
           ` <add><![CDATA[`
           ` echo 1;`
            `  die();`
           ` ]]></add>`
      `  </operation>`
   ` </file>`
`</modification>`

As you can see in this I simple add a custom code in file path `admin/Controllers/home.php` and find the line `$sql->connect();` and after that I added my custom code `echo 1; die();`.

Similarly you can find and replace the code without modifing the actual code. 

I also added the Admin panel with that you can perform action such as managing the VQ Mode, manage the users etc.

Have any features in mind, [make an issue](https://github.com/tejasrana95/infi-framework/issues). Would like to work on a feature, [make a PR](https://github.com/tejasrana95/infi-framework/pulls).

## License

[MIT](LICENSE)