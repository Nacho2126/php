<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Favoritos".
 *
 * @property integer $Clientes_idClientes
 * @property integer $Inmuebles_idInmuebles
 *
 * @property Clientes $clientesIdClientes
 * @property Inmuebles $inmueblesIdInmuebles
 */
class Favoritos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Favoritos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Clientes_idClientes', 'Inmuebles_idInmuebles'], 'required'],
            [['Clientes_idClientes', 'Inmuebles_idInmuebles'], 'integer'],
            [['Clientes_idClientes'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['Clientes_idClientes' => 'idClientes']],
            [['Inmuebles_idInmuebles'], 'exist', 'skipOnError' => true, 'targetClass' => Inmuebles::className(), 'targetAttribute' => ['Inmuebles_idInmuebles' => 'idInmuebles']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Clientes_idClientes' => 'Clientes Id Clientes',
            'Inmuebles_idInmuebles' => 'Inmuebles Id Inmuebles',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientesIdClientes()
    {
        return $this->hasOne(Clientes::className(), ['idClientes' => 'Clientes_idClientes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmueblesIdInmuebles()
    {
        return $this->hasOne(Inmuebles::className(), ['idInmuebles' => 'Inmuebles_idInmuebles']);
    }
}
