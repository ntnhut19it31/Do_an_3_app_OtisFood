package com.example.hoky.foodtea1.adapter;

import android.content.Context;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.hoky.foodtea1.R;
import com.example.hoky.foodtea1.model.Sanpham;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.util.ArrayList;

public class DoanvatAdapter extends BaseAdapter {
    Context context;
    ArrayList<Sanpham> arraydoanvat;

    public DoanvatAdapter(Context context, ArrayList<Sanpham> arraydoanvat) {
        this.context = context;
        this.arraydoanvat = arraydoanvat;
    }

    @Override
    public int getCount() {
        return arraydoanvat.size();
    }

    @Override
    public Object getItem(int i) {
        return arraydoanvat.get(i);
    }

    @Override
    public long getItemId(int i) {

        return i;
    }


    public class ViewHolder{
        public TextView txttendoanvat,txtgiadoanvat,txtmotadoanvat;
        public ImageView imgdoanvat;
    }
    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
         ViewHolder viewHolder = null;
        if (view == null){
            viewHolder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            view = inflater.inflate(R.layout.dong_doanvat,null);

            viewHolder.txttendoanvat = view.findViewById(R.id.textviewtendoanvat);
            viewHolder.txtgiadoanvat = view.findViewById(R.id.textviewgiadoanvat);
            viewHolder.txtmotadoanvat = view.findViewById(R.id.textviewmotadoanvat);
            viewHolder.imgdoanvat = view.findViewById(R.id.imageviewdoanvat);
            view.setTag(viewHolder);
        }else {
            viewHolder = (ViewHolder) view.getTag();
        }
        Sanpham sanpham = (Sanpham) getItem(i);
        viewHolder.txttendoanvat.setText(sanpham.getTensanpham());

//        DecimalFormat giúp định dạng lại một cái chuổi vs định dạng chuổi gồm 3 sô ko thành có dấu .

        DecimalFormat decimalFormat = new DecimalFormat("###,###,###");
        viewHolder.txtgiadoanvat.setText("Giá : " + decimalFormat.format(sanpham.getGiasanpham())+ " Đ");
        viewHolder.txtmotadoanvat.setMaxLines(2);
        viewHolder.txtmotadoanvat.setEllipsize(TextUtils.TruncateAt.END);
        viewHolder.txtmotadoanvat.setText(sanpham.getMotasanpham());

        Picasso.get().load(sanpham.getHinhanhsanpham())
                .placeholder(R.drawable.noimage)
                .error(R.drawable.error)
                .into(viewHolder.imgdoanvat);

        return view;
    }
}
