package com.example.hoky.foodtea1.ultil;

public class Server {
//    khi sử dụng dưới mạng localhost mà muốn chạy trên các thiết bị thì các thiết bị sẻ không hiểu localhost là gì vì thế
//    ta cần phải tạo cái biến localhost rồi phân giải localost ra để cho các thiết bị hiểu đc địa chỉ ip này.
    public static String localhost = "192.168.1.6:908";
    public static String DuongdanLoaisp = "http://" + localhost + "/server/getloaisp.php";
    public static String Duongdansanphammoinhat = "http://" + localhost + "/server/getsanphammoinhat.php";
    public static String Duongdantrasua = "http://" + localhost + "/server/getsanpham.php?page=";
    public static String Duongdandonhang = "http://" + localhost + "/server/thongtinkhachhang.php";
    public static String Duongdanchitietdonhang = "http://" + localhost + "/server/chitietdonhang.php";
}
