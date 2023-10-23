<?php

namespace app\controllers;

use app\classes\CSRFtoken;
use app\classes\request;
use app\classes\validateRequest;
use app\models\subCategory;
use app\classes\redirect;
use app\classes\session;
use Illuminate\Support\Facades\Request as FacadesRequest;

class subCategoryController extends baseController
{
    public function store()
    {
        $post = Request::get('post');

        if(CSRFtoken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "sub_categories"]
            ];

            $validator = new validateRequest;
            $validator->checkValidate($post,$rules);

            if($validator->getErrors()){
                header('HTTP/1.1 422 Validation Error!, true, 422');
                $errors = $validator->getErrors();
                echo json_encode($errors);
                exit;  
            }else{
                $subcat = new SubCategory();
                $subcat->name = $post ->name;
                $subcat->cat_id = $post->parent_cat_id;

                if($subcat->save()){
                    echo "Sub Category Created Successfully";
                }else{
                    header('HTTP/1.1 422 Sub Category Create Fail!, true, 422');
                    $data = ["name" => "Sub Category Create Fail!" ];
                    echo json_encode($data);
                    exit;  
                }
                
            }
        }else{
            header('HTTP/1.1 422 Token MisMatch Error!, true, 422');
            echo "Token MisMatch Error!"; 
            exit;  
        }
    }

    public function update(){
        $post = Request::get("post");
        
        if(CSRFtoken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" => "5", "unique" => "sub_categories"]
            ];

            $validator = new validateRequest;
            $validator->checkValidate($post,$rules);

            if($validator->getErrors()){
                header('HTTP/1.1 422 Validation Error!, true, 422');
                $errors = $validator->getErrors();
                echo json_encode($errors);
                exit;  
            }else{
                subCategory::where("id",$post->id)->update(["name"=>$post->name]);
                echo "Sub Category Edited Successfully";
            }
        }else{
            header('HTTP/1.1 422 Token MisMatch Error!, true, 422');
            echo "Token MisMatch Error!"; 
            exit;  
        }
    }

    public function delete($id)
    {
        $con = Subcategory::destroy($id);

        if($con){
            session::flash("delete_success","Sub Category Delete Successfully!");
            redirect::to("/E-commerce/public/admin/category/create");
        }else{
            session::flash("delete_fail","Sub Category Delete fail!");
            redirect::to("/E-commerce/public/admin/category/create");
        }
    }
}