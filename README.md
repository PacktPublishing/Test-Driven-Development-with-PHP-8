# Test-Driven Development with PHP 8
Test-Driven Development with PHP 8, published by Packt

<a href="https://www.packtpub.com/product/test-driven-development-with-php-8/9781803230757"><img src="https://static.packt-cdn.com/products/9781803230757/cover/smaller" alt="Test-Driven Development with PHP 8" height="256px" align="right"></a>

This is the code repository for [PHP Web Development with Laminas](https://www.packtpub.com/product/php-web-development-with-laminas/9781803245362), published by Packt.

**Build extensible, reliable, and maintainable enterprise-level applications using TDD and BDD with PHP**

## What is this book about?

This book is for PHP software developers looking to implement TDD and BDD in their projects. An understanding of object-oriented programming is required to get the most out of this book. Professional software development experience will also be beneficial to understand real-life business cases.	

This book covers the following exciting features:

* Understand how to start a software project
* Discover how to use Jira as a tool to organize your tasks
* Explore when and how to write unit, integration, and functional tests using PHPUnit
* Write behavior-driven tests using Behat
* Apply SOLID principles to help you write more testable code
* Get the most out of your automated tests by using continuous integration
* Use continuous delivery to help you prepare your application for deployment

If you feel this book is for you, get your [copy](https://www.amazon.com/dp/1803230754) today!

<a href="https://www.packtpub.com/?utm_source=github&utm_medium=banner&utm_campaign=GitHubBanner"><img src="https://raw.githubusercontent.com/PacktPublishing/GitHub/master/GitHub.png" 
alt="https://www.packtpub.com/" border="5" /></a>


## Instructions and Navigations
All of the project files are organized into folders. For example, Chapter03.

The code will look like the following:

```
class Display 
{ 
    public function outputSound() 
    { 
        $dog1 = new Dog(); 

        $dog2 = $dog1; 
        
        $dog1->setSound("Barky Bark"); 

        // Will return "Barky Bark" which was set to $dog1. 

        echo $dog2->returnSound(); 
    } 
}

```

##Erata

* Page no 159: 	Typo on filename, “behay.yml” Correct filename is “behat.yml”.

**Following is what you need for this book:**

PHP web developers end up building complex enterprise projects without prior experience in test-driven and behavior-driven development which results in software that’s complex and difficult to maintain. This step-by-step guide helps you manage the complexities of large-scale web applications. It takes you through the processes of working on a project, starting from understanding business requirements and translating them into actual maintainable software, to automated deployments.	

With the following software and hardware list you can run all code files present in the book (Chapter 01-11).

We also provide a PDF file that has color images of the screenshots/diagrams used in this book. [Click here to download it](https://packt.link/BwjU3).


### Related products <Other books you may enjoy>
* Clean Code in PHP  [[Packt]](https://www.packtpub.com/product/clean-code-in-php/9781804613870) [[Amazon]](https://www.amazon.com/Clean-Code-PHP-human-friendly-maintainable/dp/1804613878)

* High Performance with Laravel Octane  [[Packt]](https://www.packtpub.com/product/high-performance-with-laravel-octane/9781801819404) [[Amazon]](https://www.amazon.com/High-Performance-Laravel-Octane-asynchronous-ebook/dp/B0BJ4XS8VT)

## Get to Know the Author
**Rainier Sarabia** is a Software Engineering Manager, who currently works in Melbourne, Australia for Astute Payroll, a Deel company. He has worked on hundreds of complex software projects, including massive enterprise SaaS products while leading and training senior engineers from all over the world. His favorite programming languages are PHP, C#, Java, and Javascript which he uses for both professional and personal projects. He co-founded his first tech company back in 2014, with over 400,000 users. Outside of working hours, he is an amateur astronomer. He spends most of his time doing astrophotography focusing on deep-sky objects like nebulae and galaxies.

### Download a free PDF

 <i>If you have already purchased a print or Kindle version of this book, you can get a DRM-free PDF version at no cost.<br>Simply click on the link to claim your free PDF.</i>
<p align="center"> <a href="https://packt.link/free-ebook/9781803230757">https://packt.link/free-ebook/9781803230757 </a> </p>
