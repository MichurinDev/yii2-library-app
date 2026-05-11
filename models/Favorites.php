<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorites".
 *
 * @property int $id
 * @property int|null $book_id
 *
 * @property Book $book
 */
class Favorites extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id'], 'default', 'value' => null],
            [['book_id'], 'default', 'value' => null],
            [['book_id'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

}
