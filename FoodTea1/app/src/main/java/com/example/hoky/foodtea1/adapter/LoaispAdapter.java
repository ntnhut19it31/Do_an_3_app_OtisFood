package com.example.hoky.foodtea1.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.hoky.foodtea1.R;
import com.example.hoky.foodtea1.model.Loaisp;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class LoaispAdapter extends BaseAdapter {

    ArrayList<Loaisp> arraylistloaisp;
    Context context;

    public LoaispAdapter(ArrayList<Loaisp> arraylistloaisp, Context context) {
        this.arraylistloaisp = arraylistloaisp;
        this.context = context;
    }

    @Override
    public int getCount() {
//        đỗ hết những dữ liệu trong mãng
        return arraylistloaisp.size();
    }

    @Override
    public Object getItem(int i) {
        return arraylistloaisp.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

//     Hổ trợ cho việc load dữ liệu nhanh hơn, ta tạo 1 class con, class con này mình sẻ cho nó khi load dữ liệu lên lần đầu
//        thì nó sẻ bắt những ánh sạ và khi những lần sau có giá trị rồi thì nó sẻ ko cần load lại những giá trị đã load nữa (dong_listview_loaisp)
    public  class ViewHolder{
        TextView txttenloaisp;
        ImageView imgloaisp;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder viewHolder = null;
//        bắt ddiek khi run project lên thì cái view của ta rổng thì khi view rổng nó sẻ nhảy qua hàm " IF " này

        if (view == null){
//            và nó sẻ thực hiện là khái báo cái giá trị cho class viewHoler này để cho mình có thể sử dụng những thuộc tính bên trong của class
            viewHolder = new ViewHolder();
//            hàm này giúp ta get được cái service là cái layout của chúng ta ra
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            view = inflater.inflate(R.layout.dong_listview_loaisp,null);
//            gắn id cho các thuộc tính bên trong Layout
            viewHolder.txttenloaisp = view.findViewById(R.id.textviewloaisp);
            viewHolder.imgloaisp = view.findViewById(R.id.imageviewloaisp);
//            khi có hết những ánh xạ  cho các id chúng ta sẻ gán vào trong ViewHolder
             view.setTag(viewHolder);
//             bắt hàm else là khi run lần 2 là chúng ta đã có những giá trị  id của những cái view này rồi , chúng ta chỉ cần get lại thôi
        }else{
//            láy lại những cái tag mà chúng ta đã gắn vào
            viewHolder = (ViewHolder) view.getTag();
             }
//        lấy dữ liệu ra từ trong mãng
        Loaisp loaisp = (Loaisp) getItem(i);
        viewHolder.txttenloaisp.setText(loaisp.getTenloaisp());
        Picasso.get().load(loaisp.getHinhanhloaisp())
//                chưa có dữ liệu load nó sẻ hiện một ảnh chờ
                .placeholder(R.drawable.noimage)
//                nếu loafd bị lổi
                .error(R.drawable.error)
//                load thành công
                .into(viewHolder.imgloaisp);
        return view;
    }
}
