# Laravel Pagination Packages

## 1. Introduction

In other frameworks, pagination can be very painful. We hope approach to pagination will be a breath of fresh air. Pagination package is integrated with the query builder and Eloquent ORM and provides convenient, easy-to-use pagination of database records with zero configuration.

## 2. Installation

**Pretty simple with Composer, run**

    composer require pine/pine-pagination


## 3. Displaying Pagination Results

### Usage

**Enable pagination:**


    use App\Models\YourModel;

    Route::get('/url', function () {
        return YourModel::paginate();
    });
    
**Show pagination at view pages:**
   
    <x-pine-pagination :paginator="$paginator" :pageSize="$pageSize" :filter="$filter" />
    

### Declare variables require

**$paginator** is the data you want to paginate

   	$paginator = YourModel::paginate();
    
    
    
**$pageSize** is the number of pages to display (including First Page and Last Page)
    
    $pageSize = 5;
    
    Display:
    First 1 2 3 Last
    

**$filter** is defined as an array of input or select data. It includes `$key` & `$value`.

*In which:* 

`$key` is the name of the input or selected

`$value` is the string keyword of the input or selected

Data after filtering will continue to be paginated with `$key` & `$value`.

   

## 4. Customize display


### Optional variable

**$stylePaginator**: customize pagination section display

	$stylePaginator = "display: flex;
        justify-content: center;
        margin-top: 20px";

**$stylePaginatorLink**: customize pagination items display

    $stylePaginatorLink = "color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;";
        
        
 **$stylePaginatorLinkActive**: customize pagination items active display
 
    $stylePaginatorLinkActive = "color: white;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
        background-color: #0d6efd;
        border: 1px solid #0d6efd;
        ";
     
 **$nextPage**: customize show/none the next page
     
    $nextPage = [
      'display' => 'show',
      'text' => 'Next',
  	];
    
**$previousPage**: customize show/none the previous page

    $previousPage = [
          'display' => 'show',
          'text' => 'Previous',
        ];