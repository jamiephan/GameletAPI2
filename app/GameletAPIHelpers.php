<?php

/**
 * Helper class for GameletAPI
 */
class GameletAPIHelpers

{
    /**
     * Allow Methods
     *
     * @var array
     */
    public $allowMethods = [
        "info",
        "description",
        "friendlist",
    ];

    /**
     * Methods with base URL
     *
     * @var array
     */
    public $MethodsURL = [
        "info" => "http://tw.gamelet.com/user.do?username=",
        "description" => "http://tw.gamelet.com/descriptionByUser.do?username=",
        "friendlist" => "http://tw.gamelet.com/friends.do?username=",
    ];
    private $MethodModels = [
        "info" => "userInfoCache",
        "description" => "userDescriptionCache",
        "friendlist" => "userFriendlistCache",
    ];

    public function isUserInCache($id, $method){
        $model = "\\App\\" . $this->MethodModels[$method];
        $model = new $model;
        return $model::find($id) !== null;
        exit;
    }

    public function description($id, $cacheHTML, $isCache){

        $usedCache = false;

        if($isCache){
            $record = \App\userDescriptionCache::find($id);
            $description = $record->descriptionHTML;
            $usedCache = true;
            $lastUpdate = $record->updated_at->format("U");
        } else {
            phpQuery::newDocumentHTML($cacheHTML);
            $description = pq(".userContentBody")->html();
            $lastUpdate = time();

            // Insert into db
            $model = \App\userDescriptionCache::firstOrNew([
                "id" => $id 
            ]);
            $model->descriptionHTML = $description;
            $model->save();

        }
        return [
            "id"=> $id,
            "descriptionHTML" => $description,
            "usedCache" => $usedCache,
            "lastUpdate" => $lastUpdate,

        ];
    }

    public function info($id, $cacheHTML, $isCache){

        $usedCache = false;

        $nickname = "";
        $location = "";
        $website = "";
        $origin = "";
        $icon_id = "";
        $icon_type = "";

        if($isCache){
            $record = \App\userInfoCache::find($id);
            $description = $record->descriptionHTML;
            $usedCache = true;
            $lastUpdate = $record->updated_at->format("U");
        } else {
            phpQuery::newDocumentHTML($cacheHTML);
            $nickname = pq(".userDetailLabel:contains(暱稱)")->next()->text();
            dd($nickname);

            $lastUpdate = time();

            // Insert into db
            $model = \App\userDescriptionCache::firstOrNew([
                "id" => $id 
            ]);
            $model->descriptionHTML = $description;
            $model->save();

        }
        return [
            "id"=> $id,
            "descriptionHTML" => $description,
            "usedCache" => $usedCache,
            "lastUpdate" => $lastUpdate,

        ];
    }

}

$GLOBALS["GameletAPIHelper"] = new GameletAPIHelpers;

?>