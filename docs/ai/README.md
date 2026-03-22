# Oryn UI — AI Development Log

Thư mục này là **bộ nhớ lịch sử** cho GitHub Copilot, lưu trữ:

- **Activity logs** — việc đã làm, file đã tạo/sửa, mục đích
- **Error logs** — lỗi gặp phải và hướng giải quyết
- **Decision logs** — quyết định thiết kế, lý do chọn giải pháp

## Cấu Trúc

```
docs/ai/
├── README.md                    # File này
├── activity-log.md              # Log công việc theo ngày
├── error-log.md                 # Log lỗi và giải pháp
├── decisions.md                 # Log quyết định thiết kế
├── files-registry.md            # Danh sách file đã tạo & mục đích
└── session-notes.md             # Ghi chú phiên làm việc hiện tại
```

## Quy Tắc Ghi Log

1. **Mỗi khi hoàn thành một task** → Cập nhật `activity-log.md`
2. **Mỗi khi tạo file mới** → Cập nhật `files-registry.md`
3. **Mỗi khi gặp lỗi** → Ghi vào `error-log.md` kèm cách xử lý
4. **Mỗi khi đưa ra quyết định thiết kế quan trọng** → Ghi vào `decisions.md`
5. **Đầu mỗi phiên làm việc** → Đọc `session-notes.md` để nắm context, cập nhật khi kết thúc
