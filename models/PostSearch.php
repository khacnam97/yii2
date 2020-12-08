<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public $employeeName;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
            [['employeeName'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'name',
                'employeeName' => [
                    'asc' => ['employees.name' => SORT_ASC],
                    'desc' => ['employees.name' => SORT_DESC],
                    'label' => 'Employee Name'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['employees']);
            return $dataProvider;
        }

        $query->joinWith(['employees' => function ($q) {
            $q->where('employees.name LIKE "%' . $this->employeeName . '%"');
        }]);
        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//        ]);

//        $query->where('posts.id = $this->id');
        $query->Where('posts.id ' == $this->id);
        $query->Where('posts.name LIKE "%' . $this->name . '%"');

        return $dataProvider;
    }
}
