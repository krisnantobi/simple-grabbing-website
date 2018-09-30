<?php


class Hastags
{
    public function get($POST): string
    {
        $hastags = "";
        if (!empty($_POST['check1'])) $hastags = $hastags . $this->pants();
        if (!empty($_POST['check2'])) $hastags = $hastags . $this->dress();
        return $hastags;
    }
    public function pants(): string
    {
        $hastags =
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

        return $hastags;
    }

    public function dress(): string
    {
        $hastags =
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

        return $hastags;
    }
}
