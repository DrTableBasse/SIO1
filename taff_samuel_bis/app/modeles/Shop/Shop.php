<?php

namespace Samuel\Shop;

use Samuel\Database\Database;

class Shop
{

    public static function getAll(){
        return Database::query("SELECT * FROM store");
    }
    public static function afficherProduitByMemberId($member_id){
        return Database::prepare("SELECT * FROM store WHERE members_id = :id", array(":id" => $member_id) ,true, false);
    }

    public static function getUserByProduct($member_id){
        return Database::prepare("Select * from `store` Left join members on members.id = store.members_id Where members_id = :id", array(":id" => $member_id), true, true );
    }

    public static function getProductById($id){
        return Database::prepare("SELECT * FROM store Where id = :id",array(":id" => $id),true, false);
    }

    public static function addProduct($nom_produit,$quantite_produit,$prix_produit,$description_produit,$slug,$member_id){
         Database::prepare("INSERT INTO store(nom_produit,quantite_produit,prix_produit,description_produit,slug,members_id,date) 
                                            VALUES(:nom_produit,:quantite_produit,:prix_produit,:description_produit,:slug,:members_id,Now()) "
                                            , array(":nom_produit" => $nom_produit,
                                                    ":quantite_produit" => $quantite_produit,
                                                    ":prix_produit" =>$prix_produit,
                                                    ":description_produit" => $description_produit,
                                                    ":slug" => $slug,
                                                    ":members_id" => $member_id), false);
    }

    public static function deleteProductByUserId($id){
        Database::prepare("DELETE FROM store S, members M WHERE (member.id = store.member_id) and S.id = :idProduct", array(":idProduct" => $id));
    }

    public static function deleteProductById($id){
         Database::prepare("DELETE FROM store WHERE id = :id",array(":id" => $id), false);
        header('Location: Refresh:0');
    }
  /*  public static function updateProduct($id,$nom_produit,$quantite_produit,$prix_produit,$description_produit,$image_produit){
        return Database::prepare("UPDATE store set nom_produit = :nom_produit, quantite_produit = :quantite_produit, prix_produit = :prix_produit, description_produit = :description_produit ,image_produit = :image_produit
                                            WHERE id = :id"
                                            ,array(":id" => $id,
                                                   ":nom_produit" => $nom_produit,
                                                   ":quantite_produit" => $quantite_produit,
                                                   ":prix_produit" =>$prix_produit,
                                                   ":description_produit" => $description_produit,
                                                   ":image_produit" => $image_produit), true);
    }

*/
}