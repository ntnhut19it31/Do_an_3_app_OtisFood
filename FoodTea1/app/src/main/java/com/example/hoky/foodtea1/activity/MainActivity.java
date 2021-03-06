package com.example.hoky.foodtea1.activity;

import android.content.Intent;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.ViewFlipper;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.example.hoky.foodtea1.R;
import com.example.hoky.foodtea1.adapter.LoaispAdapter;
import com.example.hoky.foodtea1.adapter.SanphamAdapter;
import com.example.hoky.foodtea1.model.Giohang;
import com.example.hoky.foodtea1.model.Loaisp;
import com.example.hoky.foodtea1.model.Sanpham;
import com.example.hoky.foodtea1.ultil.CheckConnection;
import com.example.hoky.foodtea1.ultil.Server;
import com.squareup.picasso.Picasso;


import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    Toolbar toolbar;
    ViewFlipper viewFlipper;
    RecyclerView recyclerViewmanhinhchinh;
    NavigationView navigationView;
    ListView listViewmanhinhchinh;
    DrawerLayout drawerLayout;
    ArrayList<Loaisp> mangloaisp;
    LoaispAdapter loaispAdapter;
    int id=0;
    String tenloaisp = "";
    String hinhanhloaisp = "";
    ArrayList<Sanpham> mangsanpham;
    SanphamAdapter sanphamAdapter;
    public static ArrayList<Giohang> manggiohang;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Anhxa();
//        b???t dk n???u nh?? c?? k???t n???i m???i ??c ??i v??o ????? ?????c d??? li???u
        if(CheckConnection.haveNetworkConnection(getApplicationContext())){
//            ActionBar b???t s??? ki???n cho toolbar
            ActionBar();
//            B???t s??? ki???n cho ViewFlipper ch???y qu???ng c??o
            ActionViewFlipper();
            GetDuLieuLoaisp();
            GetDuLieuSPMoiNhat();
            CatchOnItemListView();
         }else {
            CheckConnection.ShowToast_Short(getApplicationContext(),"B???n h??y ki???m tra l???i k???t n???i");
            finish();
        }

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case R.id.menugiohang:
                Intent intent = new Intent(getApplicationContext(), com.example.hoky.foodtea1.activity.Giohang.class);
                startActivity(intent);
        }
        return super.onOptionsItemSelected(item);
    }

    //    B???t s??? ki???m chuy???m trang cho c??c n??t trong menu
    private void CatchOnItemListView() {
        listViewmanhinhchinh.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                switch (i){
                    case 0:
                      if (CheckConnection.haveNetworkConnection(getApplicationContext())){
                          Intent intent = new Intent(MainActivity.this,MainActivity.class);
                          startActivity(intent);
                      }else {
                          CheckConnection.ShowToast_Short(getApplicationContext(),"B???n h??y ki???m tra l???i k???t n???i");
                      }
//      ????ng menu sau khi ch???n
                      drawerLayout.closeDrawer(GravityCompat.START);
                      break;
                    case 1:
                        if (CheckConnection.haveNetworkConnection(getApplicationContext())){
                            Intent intent = new Intent(MainActivity.this,TraSuaActivity.class);
                            intent.putExtra("idloaisanpham",mangloaisp.get(i).getId());
                            startActivity(intent);
                        }else {
                            CheckConnection.ShowToast_Short(getApplicationContext(),"B???n h??y ki???m tra l???i k???t n???i");
                        }
//      ????ng menu sau khi ch???n
                        drawerLayout.closeDrawer(GravityCompat.START);
                        break;
                    case 2:
                        if (CheckConnection.haveNetworkConnection(getApplicationContext())){
                            Intent intent = new Intent(MainActivity.this,DoAnVatActivity.class);
                            intent.putExtra("idloaisanpham",mangloaisp.get(i).getId());
                            startActivity(intent);
                        }else {
                            CheckConnection.ShowToast_Short(getApplicationContext(),"B???n h??y ki???m tra l???i k???t n???i");
                        }
//      ????ng menu sau khi ch???n
                        drawerLayout.closeDrawer(GravityCompat.START);
                        break;
                    case 3:
                        if (CheckConnection.haveNetworkConnection(getApplicationContext())){
                            Intent intent = new Intent(MainActivity.this,LienHeActivity.class);
                            startActivity(intent);
                        }else {
                            CheckConnection.ShowToast_Short(getApplicationContext(),"B???n h??y ki???m tra l???i k???t n???i");
                        }
//      ????ng menu sau khi ch???n
                        drawerLayout.closeDrawer(GravityCompat.START);
                        break;
                    case 4:
                        if (CheckConnection.haveNetworkConnection(getApplicationContext())){
                            Intent intent = new Intent(MainActivity.this,GioiThieuActivity.class);
                            startActivity(intent);
                        }else {
                            CheckConnection.ShowToast_Short(getApplicationContext(),"B???n h??y ki???m tra l???i k???t n???i");
                        }
//      ????ng menu sau khi ch???n
                        drawerLayout.closeDrawer(GravityCompat.START);
                        break;
                }
            }
        });
    }


    private void GetDuLieuSPMoiNhat() {
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Server.Duongdansanphammoinhat, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                if (response != null){
                    int ID = 0;
                    String Tensanpham = "";
                    Integer Giasanpham = 0;
                    String Hinhanhsanpham = "";
                    String Motasanpham = "";
                    int IDsanpham = 0;
                    for (int i = 0 ; i < response.length();i++){
                        try {
                            JSONObject jsonObject = response.getJSONObject(i);
                            ID = jsonObject.getInt("id");
                            Tensanpham = jsonObject.getString("tensp");
                            Giasanpham = jsonObject.getInt("giasp");
                            Hinhanhsanpham = jsonObject.getString("hinhanhsp");
                            Motasanpham = jsonObject.getString("motasp");
                            IDsanpham = jsonObject.getInt("idsanpham");
                            mangsanpham.add(new Sanpham(ID,Tensanpham,Giasanpham,Hinhanhsanpham,Motasanpham,IDsanpham));
                            sanphamAdapter.notifyDataSetChanged();
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        });
        requestQueue.add(jsonArrayRequest);
    }

    private void GetDuLieuLoaisp() {
        //        mu???n ?????c n???i dung t??? ???????ng d???n useelse v??? ta s??? d???ng Volley
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Server.DuongdanLoaisp, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                //                ??k n???u nh?? d??? li???u n??y c?? n?? s??? th???c hi???n cho vc ?????c d??? li???u v??? , c??n ko th?? ko ?????c d??? li???u
//                N???u nh?? bi???n respone l?? Json tr??? v??? c?? t???n t???i th?? n?? s??? ??i v??o ?????c d??? li???u
                if (response != null){
                    for (int i = 0; i < response.length();i++){
                        try {
                            JSONObject jsonObject = response.getJSONObject(i);
                            id = jsonObject.getInt("id");
                            tenloaisp = jsonObject.getString("tenloaisp");
                            hinhanhloaisp = jsonObject.getString("hinhanhloaisp");
                            mangloaisp.add(new Loaisp(id,tenloaisp,hinhanhloaisp));
//                            n???u c?? d??? li???u m???i th?? n?? s??? update l???i b???n v???
                            loaispAdapter.notifyDataSetChanged();
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                    mangloaisp.add(3,new Loaisp(0,"Li??n H???","http://icons.iconarchive.com/icons/graphicloads/100-flat-2/128/phone-icon.png"));
                    mangloaisp.add(4,new Loaisp(0,"Th??ng Tin","http://icons.iconarchive.com/icons/graphicloads/100-flat/128/contact-icon.png"));
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                CheckConnection.ShowToast_Short(getApplicationContext(),error.toString());
            }
        });
        requestQueue.add(jsonArrayRequest);
    }

    //            B???t s??? ki???n cho ViewFlipper ch???y qu???ng c??o
    private void ActionViewFlipper() {
        ArrayList<String> mangquangcao = new ArrayList<>();
        mangquangcao.add("https://images.foody.vn/biz_banner/foody-upload-api-food-biz-190513091818.jpg");
        mangquangcao.add("https://images.foody.vn/biz_banner/foody-upload-api-food-biz-190513112957.jpg");
        mangquangcao.add("https://images.foody.vn/biz_banner/foody-upload-api-food-biz-190513092349.jpg");
        mangquangcao.add("http://sentora.vn/themes/food-stylish/food-stylish/truonghuyen.top/demo/demo1/wp-content/uploads/2017/06/banner-slide3.jpg");

        for (int i = 0; i < mangquangcao.size();i++){
            ImageView imageView = new ImageView(getApplicationContext());
//            Load h??nh ???nh t??? m???t ???????ng d???n
            Picasso.get().load(mangquangcao.get(i)).into(imageView);
//            imageView canh v???a v???i viewFlipper
            imageView.setScaleType(ImageView.ScaleType.FIT_XY);
            viewFlipper.addView(imageView);
        }
//        viewFlipper t??? ?????ng ch???y trong bao l??u
        viewFlipper.setFlipInterval(8000);
        viewFlipper.setAutoStart(true);
//        Hi???u ???ng chuy???n trang
        Animation animation_slide_in = AnimationUtils.loadAnimation(getApplicationContext(),R.anim.slide_in_right);
        Animation animation_slide_out = AnimationUtils.loadAnimation(getApplicationContext(),R.anim.slide_out_right);
        viewFlipper.setInAnimation(animation_slide_in);
        viewFlipper.setInAnimation(animation_slide_out);
    }

    //            ActionBar b???t s??? ki???n cho toolbar
    private void ActionBar() {
        setSupportActionBar(toolbar);
//        set n??t home cho toolbar
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
//        set icon cho menu
        toolbar.setNavigationIcon(android.R.drawable.ic_menu_sort_by_size);
//        b???t s??? ki???n khi k??ch v??o icon s??? hi???n ra thanh menu
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                drawerLayout.openDrawer(GravityCompat.START);

            }
        });
    }

    // g???n id v??o cho c??c bi???n ???? kh???i t???o ??? tr??n
    private void Anhxa() {
//        findViewById truy???n id v??o cho c??i bi???n n??y
        toolbar = findViewById(R.id.toolbarmanhinhchinh);
        viewFlipper = findViewById(R.id.viewlipper);
        recyclerViewmanhinhchinh = findViewById(R.id.recyclerview);
        navigationView = findViewById(R.id.navigationview);
        listViewmanhinhchinh = findViewById(R.id.listviewmanhinhchinh);
        drawerLayout = findViewById(R.id.drawerlayout);
        mangloaisp = new ArrayList<>();
        mangloaisp.add(0,new Loaisp(0,"Home",
                "http://icons.iconarchive.com/icons/graphicloads/colorful-long-shadow/128/Home-icon.png"));
        loaispAdapter = new LoaispAdapter(mangloaisp,getApplicationContext());
        listViewmanhinhchinh.setAdapter(loaispAdapter);
        mangsanpham = new ArrayList<>();
        sanphamAdapter = new SanphamAdapter(getApplicationContext(),mangsanpham);
        recyclerViewmanhinhchinh.setHasFixedSize(true);
        recyclerViewmanhinhchinh.setLayoutManager(new GridLayoutManager(getApplicationContext(),2));
        recyclerViewmanhinhchinh.setAdapter(sanphamAdapter);
        if (manggiohang != null){

        }else {
            manggiohang = new ArrayList<>();
        }
    }
}
