<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
//        var_dump($this->segment(1));//admin
//        var_dump($this->segment(2));//articles
//        dd($this->segment(3));  //null

		return [
            'title'=>'required|min:2',
            'body'=>'required',
            'category_id'=>'required|exists:categories,id',
//            'tag_list'=>'required',
//            'slug'=>'required|unique:articles,slug,'.$this->segment(3)
//             'slug'=>'unique:articles,slug,'.$this->segment(3)
		];
	}

}
