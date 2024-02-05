<?php
class Flasher
{
   public static function setFlash($message, $type)
   {
      $_SESSION['flash'] = [
         'message' => $message,
         'type' => $type
      ];
   }

   public static function setFlashes($data, $type)
   {
      if (sizeof($data) == 1) {
         self::setFlash($data[0], '', '', $type);
      } else {
         foreach ($data as $key => $item) {
            $_SESSION['flash'][$key] = [
               'msg' => $item,
               'type' => $type
            ];
         }
      }
   }

   public static function flash()
   {
      if (isset($_SESSION['flash'])) {
         if (!isset($_SESSION['flash'][0])) {
            echo '<div class="alert rounded-pill alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
               ' . $_SESSION['flash']['message'] . '
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
         } else {
            foreach ($_SESSION['flash'] as $item) {
               echo '<div class="alert rounded-pill alert-' . $item['type'] . ' alert-dismissible fade show" role="alert">
                     ' . $item['msg'] . '
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
         }
         unset($_SESSION['flash']);
      }
   }
}
