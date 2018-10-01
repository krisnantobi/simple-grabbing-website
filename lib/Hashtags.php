<?php


class Hashtags
{
    public function get($POST): string
    {
        $hashtags = "";
        if (!empty($_POST['check1'])) $hashtags = $hashtags . $this->pants();
        if (!empty($_POST['check2'])) $hashtags = $hashtags . $this->dress();
        return $hashtags;
    }
    public function pants(): string
    {
        $hashtags =
            "#celanajeansbigsize,
            #celanabigsizemurah,
            #celanaoversizemurah,
            #celanaplussizemurah,
            #jeansbigsize,
            #jeansplussizemurah,
            #celanadenimmurah,
            #celanabigsize,
            #celanajeansplussize,
            #celanaxxl,
            #celanaxxxl,
            #celanajeansxxl,
            #celanajeansxxxl,
            #celanajumbo,
            #celanajumbomurah,
            #jualcelanabigsize,
            #jualcelanaoversize,
            #jualcelanabigsizemurah,
            #jualcelanaplussize,
            #jualcelanaoversize,
            #celanapanjangbigsize,
            #celanapanjangoversize,
            #celanapanjangplussize,
            #celanapanjangjumbo,
            #celanaformal,
            #celanakerjamurah"
        ;

        return $hashtags;
    }

    public function dress(): string
    {
        $hashtags =
            "#dressjumbo,
            #jualdressjumbo,
            #dressoversize,
            #dressplussize,
            #dressbigsize,
            #jualdressbigsizemurah,
            #jualdressplussizemurah,
            #jualdressplussize,
            #jualdressjumbo,
            #jualdressoversize,
            #dressxxxl,
            #dressxxxxl,
            #dress5xl,
            #dressxxl,
            #dressjumbomurah,
            #dresspestabigsize,
            #casualdressbigsize,
            #dressgedemurah,
            #dressplussizemurah,
            #minidressbigsize,
            #minidressplussize,
            #curvydress,
            #dresskerjabigsize,
            #dresskondanganbigsize,
            #ootdbigsize,
            #ootdplussize,
            #ootdoversize"
        ;

        return $hashtags;
    }
}
